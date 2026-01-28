<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestVerifyEmailController extends Controller
{
    /**
     * Mark the user's email address as verified without requiring authentication.
     */
    public function __invoke(Request $request, $id, $hash): RedirectResponse
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Verify the hash matches the user's email
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->with('error', 'Invalid verification link.');
        }

        // Check if email is already verified
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('status', 'Your email is already verified. Please login.');
        }

        // Mark email as verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // Redirect to login with success message
        return redirect()->route('login')->with('status', 'Your email has been verified successfully! Please login to continue.');
    }
}

