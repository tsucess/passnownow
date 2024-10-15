<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Admin::get();
        return view('admin.admins', ['fetchAdmins' => $users]);
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
        // dd($request);
        // Validate 
        $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:' . Admin::class],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:' . Admin::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Admin::class],
            'terms' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $admin = new User;

        //     $admin->unique_id = $request->input('unique_id');
        //     $admin->first_name = $request->input('fname');
        //     $admin->last_name = $request->input('lname');
        //     $admin->username = $request->input('username');
        //     $admin->email = $request->input('email');
        //     $admin->terms = $request->input('terms');
        //     $admin->role = $request->input('role');
        //     $admin->password = Hash::make($request->input('password'));

        // $admin->save();



        // Register
        Admin::create([
            'unique_id' => $request->unique_id,
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'terms' => $request->terms,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));


        return redirect('/admins')->with('success', 'Admin Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $data)
    {
        $user = $data;
        return view('admin.viewdata', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Admin $data, Request $request)
    {
        // dd($request);

        $request->validate([

            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'username' => ['required', 'string', 'max:255', 'unique:'.Admin::class],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Admin::class],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $done = $data->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // 'username' => $request->username,
            // 'email' => $request->email,
            'role' => $request->role,
        ]);

        if ($done){
            return back()->with('status', 'User updated Successfully');
            // return redirect('/admins')->with('success', 'User updated Successfully');
        }
        else
        {
            return redirect('/admins')->with('error', 'Something went wrong');
        };
        
        // $request->user()->save();
    }

/**
     * Update the user's password.
     */
    public function updatepassword(Admin $data, Request $request): RedirectResponse
    {

        // dd($request);
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        dd($data);
        $data->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'Password updated successfully');
    }











    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('ok');
    }
}
