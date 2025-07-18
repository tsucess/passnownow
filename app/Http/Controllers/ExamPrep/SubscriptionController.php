<?php

namespace App\Http\Controllers\ExamPrep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->input('email');

        // Send the email to your address
        Mail::raw("New subscription from: $email", function ($message) {
            $message->to('akinrinolasamuel1@gmail.com') // Replace with your email address
                    ->subject('Passnownow New Subscriber');
        });

        // return back()->with('success', 'Thank you for subscribing!');
        return redirect('/#subscribe')->with('success', 'Thank you for subscribing!');
    }
}



