<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Models\Pay;
use App\Mail\PayFormMail;
use Illuminate\Support\Facades\Mail;

class PayController extends Controller
{
    
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'orderID'    => 'required|unique:pays,order_id',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:255',
            'plan'       => 'required|string',
        ]);

        if ($validated['plan'] === 'call') {
            $plan = '60 minutes telephone interactive discussion with our Expert';
            $amount = 5000;
        } else if ($validated['plan'] === 'whatsappp') {
            $plan = '60 minutes Whatsapp conversation';
            $amount = 5000;
        } else if ($validated['plan'] === 'face2face') {
            $plan = 'Face to Face counselling at The Rise Labs';
            $amount = 5000;
        }

        $data = array(
            'order_id'   => $validated['orderID'],
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            "amount" => $amount * 100,
            "reference" => Paystack::genTranxRef(),
            'email'      => $validated['email'],
            'phone'      => $validated['phone'],
            "currency" => 'NGN',
            'plan'       => $plan,
            'payment_status' => "pending",
            'payment_method' => "none"
        );


        // Save the data to the database
        Pay::create($data);
        // Pay::create([
        //     'order_id'   => $validated['orderID'],
        //     'first_name' => $validated['first_name'],
        //     'last_name'  => $validated['last_name'],
        //     'email'      => $validated['email'],
        //     'phone'      => $validated['phone'],
        //     'plan'       => $validated['plan'],
        // ]);


        try {
            return Paystack::getAuthorizationUrl($data)->redirectNow();
              // Send the email
        Mail::to('akinrinolasamuel1@gmail.com')->send(new PayFormMail($validated));

        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }


        // Redirect with a success message
        return redirect()->back()->with('success', 'Subscription created and email sent successfully!');
    }


    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {

        // Now you have the payment details,
        $paymentDetails = Paystack::getPaymentData();


        $reference = $paymentDetails['data']['reference'];
        $method = $paymentDetails['data']['channel'];
        $status = $paymentDetails['data']['status'];
        $amount = $paymentDetails['data']['amount'];

        // you can store the authorization_code in your db to allow for recurrent subscriptions

        Pay::where('reference', $reference)->update([
            'amount' => $amount / 100,
            'payment_method' => $method,
            'payment_status' => $status
        ]);

        // Update Card Details 
        // $card = Carddetail::find($paymentDetails['data']['reference']);

        // you can then redirect or do whatever you want
        return redirect('/subscribeform')->with('success', 'Subcription completed and email sent successfully!');
    }
}
