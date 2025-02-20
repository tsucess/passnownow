<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        // dd($request);
        // Validate
        //    $data = $request->validate([
        $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'terms' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
            ],
        ]);

        // Register
        // $user = User::create($data);
        $user = User::create([
            'unique_id' => $request->unique_id,
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'terms' => $request->terms,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);



        event(new Registered($user));

        Auth::login($user);

        return redirect(route('verification.notice', absolute: false));
    }
}
