<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.change-password');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect('/')->with('success', 'Password berhasil diubah, Silahkan login ulang');
        } else {
            return redirect()->back()->with('fail', 'Password lama tidak valid');
        }
    }
}
