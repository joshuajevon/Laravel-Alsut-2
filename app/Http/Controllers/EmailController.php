<?php

namespace App\Http\Controllers;

use App\Mail\sendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function viewSend()
    {
        return view('email.index');
    }

    public function sendEmail(Request $request)
    {
        $user = User::where('email', $request->email)->get();
        // send the message...

        Mail::to($request->user())->send(new sendEmail($user[0], $request->message));

        return response()->json('Success', 200);
    }
}
