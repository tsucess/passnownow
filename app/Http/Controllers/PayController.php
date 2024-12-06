<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pay;

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
            'plan'       => 'required|string',
        ]);

        // Save the data to the database
        Pay::create([
            'order_id'   => $validated['orderID'],
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'plan'       => $validated['plan'],
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Subscription created successfully!');
    }
}
