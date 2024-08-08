<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addAdmin(AdminRequest $request)
    {
        $data = $request->validated();
        $user = new User($data);
        $user->save();
        $userId = User::where('nama', $data['nama'])->first();
        Admin::create([
            'user_id' => $userId->id
        ]);
        return redirect("/admin");
    }

    public function editAdmin(AdminEditRequest $request)
    {
        $data = $request->validated();
        $admin = User::where('id', $data['id'])->first();
        if (!$admin) {
            return redirect()->back()->withErrors(['error', 'Data Admin tidak ada']);
        }
        $admin->fill($data);
        $admin->save();
        return redirect('/admin');
    }

    public function deleteAdmin($id)
    {
        Admin::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
        return redirect('/admin');
    }

    public function absenView()
    {
        return view("admin.absen");
    }

    public function pegawaiView()
    {
        return view("admin.pegawai");
    }

    public function adminView()
    {
        $admin = Admin::with(['user'])->get();
        return view('admin.admin', compact('admin'));
    }

    public function gajiPegawaiView()
    {
        return view("admin.gajiPegawai");
    }
}
