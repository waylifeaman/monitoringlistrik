<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserProfileController extends Controller
{
    public function showProfileForm()
    {
        $user = auth()->user(); // Ambil data user yang sedang login
        return view('profile_edit', compact('user'), ['title' => 'edit profile']);
    }

    // Menyimpan perubahan pada form profil
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        try {
            // Validasi data form sesuai kebutuhan Anda
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:3|',
            ]);

            // Update data profil
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            // Hanya mengupdate password jika diisi
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
                $data['password_confirmation'] = ($request->password_confirmation);
            }

            $user->update($data);

            return redirect()->route('profile.form')->with('success', 'Profil berhasil diperbarui.');
        } catch (ValidationException $e) {
            // Tangkap pesan error validasi dan kirimkan ke tampilan
            return redirect()->route('profile.form')->withErrors($e->errors())->withInput();
        }
    }
}
