<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
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
        /**
         * Get all data with user role only
         */
        $users = Admin::wherenot('role', 'user')->get();
        return view('admin.admins', ['fetchAdmins' => $users]);
    }

    public function usersonly()
    {
        /**
         * Get all data with user role only
         */
        $users = Admin::where('role', 'user')->get();
        // $users = Admin::get();
        return view('admin.users', ['fetchUsers' => $users]);
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

        if ($request->role === "user") {
            if ($done) {
                // return back()->with('status', 'User updated Successfully');
                return redirect('/users')->with('success', 'User updated Successfully');
            } else {
                return redirect('/users')->with('error', 'Something went wrong');
            };
        }
        else{
            if ($done) {
                // return back()->with('status', 'User updated Successfully');
                return redirect('/admins')->with('success', 'User updated Successfully');
            } else {
                return redirect('/admins')->with('error', 'Something went wrong');
            };

        }


    }

    /**
     * Update the user's password.
     */
    public function updatepassword(Admin $data, Request $request)
    {

        // dd($request);
        $validated = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $done = $data->update([
            'password' => Hash::make($validated['password']),
        ]);
        // dd($done);
        if ($done) {
            return back()->with('status', 'success');
            // return redirect('/admins')->with('success', 'User updated Successfully');
        } else {
            return back()->with('status', 'error');
            // return redirect('/admins')->with('error', 'Something went wrong');
        };
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $data)
    {
        $done = $data->delete();
        if ($done) {
            return redirect('/admins')->with('success', 'User deleted successfully');
        } else {
            return redirect('/admins')->with('error', 'Something went wrong');
        };
    }
}
