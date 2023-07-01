<?php

namespace App\Http\Controllers\Api\ResetPassword;

use App\Http\Controllers\Controller;
use App\Mail\SendCodeResetPassword;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller{

    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Delete all old code that user send before.
        PasswordReset::query()
        ->where('email', $request->email)
            ->delete();

        // Generate random code
        $data['code'] = mt_rand(100000, 999999);

        // Create a new code
        $codeData = PasswordReset::create($data);

        // Send email to user
        Mail::to($request->email)->send(new SendCodeResetPassword($codeData->code));

        return response(['message' => "Code reset password send from email"], 200);
    }

}
