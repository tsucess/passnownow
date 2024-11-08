<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Carddetail;
use App\Models\Transaction;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;



class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {

        $request->validate([
            'orderID' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'plan' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'currency' => ['required', 'string', 'max:255'],
            
        ]);
        $date = new DateTime('now');
      
        if ($request->plan === 'daily') {
            $plan = 'Daily';
            $amount = 300;
            $expiry_date = $date->modify('+1 day');
        }
        else if ($request->plan === 'weekly')
        {
            $plan = 'Weekly';
            $amount = 500;
            $expiry_date = $date->modify('+1 week');
        }
        else if ($request->plan === 'monthly')
        {
            $plan = 'Monthly';
            $amount = 1100;
            $expiry_date = $date->modify('+1 month');
        }
        else if ($request->plan === 'quarterly')
        {
            $plan = '3 Months';
            $amount = 2600;
            $expiry_date = $date->modify('+3 month');
        }
        else if ($request->plan === 'halfly')
        {
            $plan = '6 Months';
            $amount = 5100;
            $expiry_date = $date->modify('+6 month');
        }
        else if ($request->plan === 'yearly')
        {
            $plan = 'Yearly';
            $amount = 10100;
            $expiry_date = $date->modify('+1 year');

        }

    //    dd($request);
         

        $data = array(
            'user_unique_id' => $request->user_unique_id,
            "first_name"=> $request->first_name,
            "last_name"=> $request->last_name,
            "amount" => $amount * 100,
            "reference" => Paystack::genTranxRef(),
            "email" => $request->email,
            "currency" => $request->currency,
            "orderID" => $request->orderID,
            'plan_name' => $plan,
            'expiry_date' => $expiry_date->format("Y-m-d H:i:s"),
            'payment_status' => "pending",
        );

        // dd($data);

           // Add to subscribe
           Transaction::create($data);
        //    Carddetail::create([
        //     'user_unique_id' => $request->user_unique_id
        //    ]);

        try{
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {

        // Now you have the payment details,
        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);
        // $paymentDetails->data
        // $paymentDetails->message
        // $paymentDetails->status


        // you can store the authorization_code in your db to allow for recurrent subscriptions
        $data = Transaction::find($paymentDetails->data->reference);

        $data->payment_method = $paymentDetails->data->channel;
        $data->payment_status = $paymentDetails->data->status;
        $data->amount = $paymentDetails->data->amount/100;
        $data->save();


        // Update Card Details 
        // $card = Carddetail::find($paymentDetails->data->reference);
        
        // you can then redirect or do whatever you want
        return redirect('/dashboard')->with('success', 'Subcription successful, Happy Learning!');





    }
}