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
        $user = User::where('nama', $data['nama'])->first();
        if(!$user || $user->password !== $data['password']){
            return redirect("/login");
        }
        Auth::login($user);
        return redirect("/absen");
    }
}
