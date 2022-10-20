<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        $data['subtitle'] = 'Manajemen Data User';
        return view('user/password', $data);
    }

    public function passwordAction(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda berhasil logout!');
        // return redirect('/');
    }

    public function pengaturan()
    {
        $id = Auth::user()->user_id;
        $data['title'] = 'PENGATURAN AKUN';
        $data['subtitle'] = 'Manajemen Data User';
        $data['user'] = User::where('user_id', $id)->get();
        return view('user/pengaturan', $data);
    }

    public function pengaturanAction(Request $request)
    {
        $id = Auth::user()->user_id;
        if ($request->file('photo') == "") {
            $request->validate([
                'nama' => 'required',
                'username' => 'required',
            ]);

            User::where('user_id', $id)->update([
                'name' => $request->nama,
                'username' => $request->username,
            ]);
        } else {
            $request->validate([
                'nama' => 'required',
                'username' => 'required',
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);
            $image_path = $request->file('photo')->store('uploads', 'public');

            User::where('user_id', $id)->update([
                'name' => $request->nama,
                'username' => $request->username,
                'photo' => $image_path,
            ]);
        }

        return redirect()->route('pengaturan')->with('success', 'Data user berhasil diubah!');
    }
}
