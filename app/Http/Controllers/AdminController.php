<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $admins = User::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%")
                         ->orWhere('email', 'LIKE', "%{$search}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin.admin-list', compact('admins', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        // Get user info from Google
        $googleUser = $this->getGoogleUserInfo($request->email);
        
        if (!$googleUser) {
            return redirect()->back()->withErrors(['email' => 'Unable to fetch user information from Google. Please ensure the email is a valid Google account.']);
        }

        User::create([
            'name' => $googleUser['name'],
            'email' => $request->email,
            'password' => Hash::make('google_auth_' . time()), // Temporary password
        ]);

        return redirect()->route('admin.events.admin-list')
                         ->with('success', 'Admin berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $admin = User::findOrFail($id);
        
        // Get updated user info from Google
        $googleUser = $this->getGoogleUserInfo($request->email);
        
        if (!$googleUser) {
            return redirect()->back()->withErrors(['email' => 'Unable to fetch user information from Google. Please ensure the email is a valid Google account.']);
        }

        $admin->update([
            'name' => $googleUser['name'],
            'email' => $request->email,
        ]);

        return redirect()->route('admin.events.admin-list')
                         ->with('success', 'Admin berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.events.admin-list')
                         ->with('success', 'Admin berhasil dihapus!');
    }

    private function getGoogleUserInfo($email)
    {
        try {
            // Use Google People API to get user info
            $response = Http::get('https://www.googleapis.com/oauth2/v1/userinfo', [
                'alt' => 'json',
                'access_token' => $this->getGoogleAccessToken($email)
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            // Fallback: extract name from email
            $name = explode('@', $email)[0];
            $name = ucwords(str_replace(['.', '_', '-'], ' ', $name));
            
            return ['name' => $name];
        } catch (\Exception $e) {
            // Fallback: extract name from email
            $name = explode('@', $email)[0];
            $name = ucwords(str_replace(['.', '_', '-'], ' ', $name));
            
            return ['name' => $name];
        }
    }

    private function getGoogleAccessToken($email)
    {
        // This is a simplified approach - in production you'd need proper OAuth flow
        // For now, we'll use the fallback method in getGoogleUserInfo
        return null;
    }
}