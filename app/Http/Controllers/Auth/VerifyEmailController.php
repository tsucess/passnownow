<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        // Find the user by ID from the URL
        $user = User::findOrFail($request->route('id'));

        // Verify the hash matches the user's email
        if (! hash_equals(sha1($user->getEmailForVerification()), (string) $request->route('hash'))) {
            return redirect()->route('login')->with('error', 'Invalid verification link.');
        }

        // Check if already verified
        if ($user->hasVerifiedEmail()) {
            // If user is authenticated, go to dashboard
            if (Auth::check()) {
                return redirect()->route('dashboard')->with('success', 'Email already verified!');
            }
            // Otherwise, redirect to login
            return redirect()->route('login')->with('success', 'Email already verified! Please login.');
        }

        // Mark email as verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // If user is authenticated, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard')->with('success', 'Email verified successfully!');
        }

        // If not authenticated, redirect to login with success message
        return redirect()->route('login')->with('success', 'Email verified successfully! Please login to continue.');
    }
}
