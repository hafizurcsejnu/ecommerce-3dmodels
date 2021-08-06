<?php
namespace App\Http\Controllers;

use App\Models\DataLookup;
use Illuminate\Http\Request;
use DB;

class DataLookupController extends Controller
{
     
    public function index()
    {
        $data = DataLookup::orderBy('id', 'desc')->get();
        
        //dd($data);
        return view('admin.data_lookup', ['data'=>$data]);
    }     
    
    
    public function store(Request $request)
    {
        $data = new DataLookup;
        $data->title = $request->title;
        $data->data_type = $request->data_type;
        $data->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been inserted successfully.'));        
    }

    public function update(Request $request)    {        
        
        $data = DataLookup::find($request->id);
        $data->title = $request->title;
        $data->data_type = $request->data_type;
        $data->save(); 

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been updated successfully.'));
    }

    public function destroy($id)
    {       
        $data = DataLookup::find($id);
        $data->delete();

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been deleted successfully.'));
    }

    
    
}
