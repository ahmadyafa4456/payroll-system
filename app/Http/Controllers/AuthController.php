<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Models\Admin;
use App\Models\Pegawai;

class AuthController extends Controller
{
    public function loginView()
    {
        return view("auth.login");
    }

    public function loginStore(UserLoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('nama', $data['nama'])->where('password', $data['password'])->first();
        if (!$user) {
            return back()->with('error', 'nama atau password anda salah');
        }
        Auth::login($user);
        if (Pegawai::where('user_id', Auth::id())->first()) {
            return view('pegawai.home');
        }
        if (Admin::where('user_id', Auth::id())->first()) {
            return view('admin.absen');
        }
    }
}
