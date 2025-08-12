<?php

namespace App\Http\Controllers\ExamPrep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ExamPrep\Admin;
use App\Models\ExamPrep\Carddetail;
use App\Models\ExamPrep\Pay;
use App\Models\ExamPrep\Transaction;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Facades\Auth;



class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {

        $date = new DateTime('now');
        if ($request->page === 'services') {
            // Validate the incoming data
            $validated = $request->validate([
                'orderID'    => 'required|unique:pays,order_id',
                'first_name' => 'required|string|max:255',
                'last_name'  => 'required|string|max:255',
                'email'      => 'required|email|max:255',
                'phone'      => 'required|string|max:255',
                'plan'       => 'required|string',
            ]);

            //  dd($validated['plan']);
            if ($validated['plan'] === 'call') {
                $plan = '60 minutes telephone interactive discussion with our Expert';
                $amount = 15000;
            } else if ($validated['plan'] === 'whatsapp') {
                $plan = '60 minutes Whatsapp conversation';
                $amount = 5000;
            } else if ($validated['plan'] == 'face2face') {
                $plan = 'Face to Face counselling at The Rise Labs';
                $amount = 10000;
            } else {
                $amount = 0;
                $plan = NULL;
            }

            $data = array(
                'user_unique_id' => 'none',
                'orderID'   => $validated['orderID'],
                'first_name' => $validated['first_name'],
                'last_name'  => $validated['last_name'],
                'amount' => $amount * 100,
                'reference' => Paystack::genTranxRef(),
                'email'      => $validated['email'],
                'phone'      => $validated['phone'],
                'currency' => 'NGN',
                'services'   => $request->page,
                'plan_name'   => $plan,
                'expiry_date' => $date->format("Y-m-d H:i:s"),
                'active_status' => "ongoing",
                'payment_status' => "pending",
                'payment_method' => "none"
            );


            // Save the data to the database
            Transaction::create($data);
        } else {

            $request->validate([
                'orderID' => ['required', 'string', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'plan' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'currency' => ['required', 'string', 'max:255'],

            ]);
           

            if ($request->plan === 'daily') {
                $plan = 'Daily';
                $amount = 300;
                $expiry_date = $date->modify('+1 day');
            } else if ($request->plan === 'weekly') {
                $plan = 'Weekly';
                $amount = 500;
                $expiry_date = $date->modify('+1 week');
            } else if ($request->plan === 'monthly') {
                $plan = 'Monthly';
                $amount = 1100;
                $expiry_date = $date->modify('+1 month');
            } else if ($request->plan === 'quarterly') {
                $plan = '3 Months';
                $amount = 2600;
                $expiry_date = $date->modify('+3 month');
            } else if ($request->plan === 'halfly') {
                $plan = '6 Months';
                $amount = 5100;
                $expiry_date = $date->modify('+6 month');
            } else if ($request->plan === 'yearly') {
                $plan = 'Yearly';
                $amount = 10100;
                $expiry_date = $date->modify('+1 year');
            }

       
            $data = array(
                'user_unique_id' => $request->user_unique_id,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "amount" => $amount * 100,
                "reference" => Paystack::genTranxRef(),
                "email" => $request->email,
                'phone' => 'none',
                "currency" => $request->currency,
                "orderID" => $request->orderID,
                'services'   => $request->page,
                'plan_name' => $plan,
                'expiry_date' => $expiry_date->format("Y-m-d H:i:s"),
                'payment_status' => "pending",
                'payment_method' => "none"
            );


            // Add to subscribe
            Transaction::create($data);
            //    Carddetail::create([
            //     'user_unique_id' => $request->user_unique_id
            //    ]);
        }
        try {
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
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
        $reference = $paymentDetails['data']['reference'];
        $method = $paymentDetails['data']['channel'];
        $status = $paymentDetails['data']['status'];
        $amount = $paymentDetails['data']['amount'];

        // you can store the authorization_code in your db to allow for recurrent subscriptions

        Transaction::where('reference', $reference)->update([
            'amount' => $amount / 100,
            'payment_method' => $method,
            'payment_status' => $status
        ]);

        $page = Transaction::where('reference', $reference)->get();
        // dd($page);

        $userID = Auth::user()->unique_id;
        Admin::where('unique_id', $userID)->where('role', 'user')->update(['status' => 1]);

        // Update Card Details 
        // $card = Carddetail::find($paymentDetails['data']['reference']);

        // you can then redirect or do whatever you want
        return redirect('/dashboard')->with('success', 'Subcription successful, Happy Learning!');
    }
}
