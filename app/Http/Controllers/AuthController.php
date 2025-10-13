<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.admin-login');
    }

    public function show_admin_list()
    {
        return view('admin.admin-list');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                return redirect()->route('admin.login')->with('error', 'Email Anda tidak memiliki akses admin. Silakan hubungi administrator.');
            }

            if (!$user->google_id) {
                $user->update(['google_id' => $googleUser->id]);
            }

            Auth::login($user);

            return redirect()->route('admin.events.index');
        } catch (\Exception $e) {
            Log::error('Google OAuth error: ' . $e->getMessage());
            return redirect()->route('admin.login')->with('error', 'Terjadi kesalahan saat login dengan Google. Silakan coba lagi.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil logout.');
    }
}
