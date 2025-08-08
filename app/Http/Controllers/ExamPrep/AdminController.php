<?php

namespace App\Http\Controllers\ExamPrep;

use App\Http\Controllers\Controller;
use App\Models\ExamPrep\Admin;
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
        // $countAdmins = Admin::wherenot('role', 'user')->count();
        $noOfMaleAdmins = Admin::wherenot('role', 'user')->where('gender', 'male')->count();
        $noOfFemaleAdmins = Admin::wherenot('role', 'user')->where('gender', 'female')->count();
        $countAdmins = $users->count();


        return view('admin.admins', [
            'fetchAdmins' => $users,
            'countAdmins' => $countAdmins,
            'noOfMaleAdmins' => $noOfMaleAdmins,
            'noOfFemaleAdmins' => $noOfFemaleAdmins,
        ]);
    }

    public function usersonly()
    {
        /**
         * Get all data with user role only
         */
        $users = Admin::where('role', 'user')->get();
        $usersActive = Admin::where('role', 'user')->where('status', 1)->count();
        $usersNotActive = Admin::where('role', 'user')->where('status', 0)->count();
        $noOfMaleUsers = Admin::where('role', 'user')->where('gender', 'male')->count();
        $noOfFemaleUsers = Admin::where('role', 'user')->where('gender', 'female')->count();
        $countUsers = $users->count();

        return view('admin.users', [
            'fetchUsers' => $users,
            'countUsers' => $countUsers,
            'usersActive' => $usersActive,
            'usersNotActive' => $usersNotActive,
            'noOfMaleUsers' => $noOfMaleUsers,
            'noOfFemaleUsers' => $noOfFemaleUsers,
        ]);
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

        if ($request->role === 'user') {
            return redirect('/users')->with('success', 'User Created successfully');
            exit();
        }
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

        // dd($request->role);


        if ($request->role) {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name'  => ['required', 'string', 'max:255'],
                'gender'     => ['nullable', 'in:male,female,other'],
                'role'  => ['required', 'string', 'max:255'],
                // if you want to update email:
                // 'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,' . $data->id],
            ]);
            $role = $request->role;
        } else {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name'  => ['required', 'string', 'max:255'],
                'gender'     => ['nullable', 'in:male,female,other'],
            ]);
            $role = 'user';
        }


        $done = $data->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'gender'     => $request->gender, // <-- added
            'role'       => $role,
            // 'email'   => $request->email,
        ]);

        // $done = $data->update([
        //     'first_name' => $request->first_name,
        //     'last_name'  => $request->last_name,
        //     'gender'     => $request->gender, // <-- added
        //     'role'       => $request->role,
        //     // 'email'   => $request->email,
        // ]);


        if ($done) {
            if ($request == null) {
                return redirect('/admins')->with('success', 'Admin updated successfully');
            } else {
                return redirect('/users')->with('success', 'User updated successfully');
            }
        } else {
            return redirect('/admins')->with('error', 'Something went wrong');
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
