<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\User\Entities\User;
use Validator;
use Illuminate\Http\Request;
use Exception;
use Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;

class OtpController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function requestOtp(Request $request)
    {
        return $request;
        $otp = rand(1000,9999);
        Log::info("otp = ".$otp);
        $user = User::where('email','=',$request->email)->update(['otp' => $otp]);
        if($user){

        $mail_details = [
            'subject' => 'Testing Application OTP',
            'body' => 'Your OTP is : '. $otp
        ];
       
         \Mail::to($request->email)->send(new sendEmail($mail_details));
       
         return response(["status" => 200, "message" => "OTP sent successfully"]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }

    public function verifyOtp(Request $request){
    
        $user  = User::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
        if($user){
            auth()->login($user, true);
            User::where('email','=',$request->email)->update(['otp' => null]);
            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return response(["status" => 200, "message" => "Success", 'user' => auth()->user(), 'access_token' => $accessToken]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }
}
