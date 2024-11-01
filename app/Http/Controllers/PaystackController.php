<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaystackController extends Controller
{


    // {{ env('PAYSTACK_PUBLIC_KEY')}}
    // {{ env('PAYSTACK_SECRET_KEY ')}}

    /**
     * Show the callback function resource.
     */
    public function callback(Request $request)
    {
        //


        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => "customer@email.com",
            'amount' => "500000"
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer SECRET_KEY",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        echo $result;
    }



    /**
     * Show the success transaction  resource.
     */
    public function success(string $id)
    {
        //
    }



    /**
     * Show the form to cancel the specified resource.
     */
    public function cancel(string $id)
    {
        //
    }

















    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }






    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
