<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SignupEmail;
use App\Mail\ResetPasswordEmail;
use App\Mail\ContactEmail;
use App\Mail\OrderEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function signupEmail($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function resetPasswordEmail($email, $reset_pass_code){
        $data = [
            'reset_pass_code' => $reset_pass_code
        ];
        Mail::to($email)->send(new ResetPasswordEmail($data));
    }

    public static function contactEmail($name, $email, $message){
        $data = [
            'name' => $name,
            'email' => $email,
            'message' => $message
        ];
        Mail::to('admin@vanessarezende.com')->send(new ContactEmail($data));
    }

    public static function orderEmail($name, $email, $order_id){
        $data = [
            'name' => $name,
            'order_id' => $order_id
        ];
        Mail::to($email)->send(new OrderEmail($data));
    }

}
