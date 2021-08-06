<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Helper\Helper;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login( Request $req)
    {
         $user = User::where(['email'=>$req->email])->first();          
         
         if($user){

                if($user->is_verified != 1)
                {
                    $req->session()->put('exception', 'Your account is not verified. Please check your email!');
                    return redirect('/login');
                }   
                if($user->active == 'disable')
                {
                    $req->session()->put('exception', 'Your account is now disabled. Please contact with system admin.');
                    return redirect('/login');
                }  

                
                if(!Hash::check($req->password, $user->password))
                {
                    $req->session()->put('exception', 'Wrong password! Please try with correct one.');                    
                   
                    if($user->wrong_login_attempt == 5)
                    {
                        $user->active == 'disable';
                        $user->save();
                        $req->session()->put('exception', 'You have cross max incorrect password limit! Your account is now disabled! Please contact with system admin.');
                        return redirect('/login');
                    } else{
                        if($user->wrong_login_attempt == null){
                            $user->wrong_login_attempt = 1;
                            $user->save();
                        }else{
                            $user->wrong_login_attempt = $user->wrong_login_attempt + 1;
                            $user->save();
                        }
                    }     
                    //dd($user->wrong_login_attempt); 
                    return redirect('/login');
                }   
                else{                   
                    session()->put('user', $user);
                    $req->session()->put('user', $user);
                    if($user->user_type == 'User' && session('source')=='cart'){
                        session()->pull('source');
                        return redirect('/checkout');
                    }    
                    
                    if($user->user_type == 'Admin'){
                        return redirect('/admin');
                    }        
                    return redirect('/shop');
                }
        }else{
            $req->session()->put('exception', 'User not found!');
            return redirect('/login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
    //    $validate = $request->validate([
    //         'name'=>'required',
    //         'email'=>'required',
    //         'password'=>'required|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
    //     ]);

    $password = $request->password;    
    
    // password length
    if(strlen($password)<8){
        return response()->json(['success'=>false,'data'=>'The password must be at least 8 characters containing with a number and a sign letter.']);
    }
    // number validation
    for ($i = 0; $i <= strlen($password)-1; $i++) {
        $char = $password[$i];
        $has_number = in_array($char, range(0,9)) ? 'yes' : 'no';
    }
    if($has_number == 'no'){
        return response()->json(['success'=>false,'data'=>'The password must be at least 8 characters containing with a number and a sign letter.']);
    }

    // special character validation
    if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password))
    {
        return response()->json(['success'=>false,'data'=>'The password must be at least 8 characters containing with a number and a sign letter.']);
    }
           
    // existance check
    $is_user = User::where(['email'=>$request->email])->first();
    if($is_user){        
        return response()->json(['success'=>false,'data'=>'This email is already registered.']);
    }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->password = Hash::make($request->password);
        $user->user_type = 'User';
        $user->verification_code = sha1(time());
        $user->save();
        
        if($user!=null)
        {
            //send email
            MailController::signupEmail($user->name, $user->email, $user->verification_code);
            //show message            
            return response()->json(['success'=>true,'data'=>'Your account has been created. Please check your email for verification link.']);
        }
        
        //error message
        //return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong'));
        return response()->json(['success'=>false,'data'=>'Something went wrong! Please try again.']);
    }

    public function storeUser(Request $request){
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email; 
        $data->password = Hash::make($request->password);
        $data->user_type = $request->user_type;
        $data->is_verified = '1';
        $data->verification_code = sha1(time());
        $data->save();
        Helper::saveDefaultFolders($data->id);
        return redirect()->back()->with(session()->flash('alert-success', 'New user created.'));
    }
   



    public function myAccount()
    {
        return view('my_account')->with('main_content');
    }

    public function logout()
    {
        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('/');
    }
}
