<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DateTime;

class AuthenticatedSessionController extends Controller
{


 /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        
        $request->authenticate();
        $request->session()->regenerate();
       
        $userID = Auth::user()->unique_id;
        if (Auth::user()->role === 'user'){
            $subHistory = Transaction::where('user_unique_id', $userID)->where('payment_status', 'success')->get();
            $subExpiry = Transaction::where('user_unique_id', $userID)->where('payment_status', 'success')->latest('updated_at')->limit(1)->get();
    
            $exp = date_create($subExpiry[0]->expiry_date);
            $exp_d = date_format($exp, 'Y-m-d');
            $now = date('Y-m-d');
            if ($now > $exp_d) {
                Admin::where('unique_id', $userID)->where('role', 'user')->update(['status'=> 0]);
            }
        }
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
