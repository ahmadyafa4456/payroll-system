<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Pegawai;
use App\Models\totalGaji;
use App\Models\AbsenPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PegawaiRequest;
use App\Http\Requests\AdminEditRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

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

    public function tambahPegawai(PegawaiRequest $request)
    {
        $data = $request->validated();
        $pegawai = new Pegawai($data);
        $pegawai->tempat_tinggal = $data['tempat_tinggal'];
        $pegawai->save();
        return redirect("/pegawai");
    }

    public function editPegawai(PegawaiRequest $request)
    {
        $data = $request->validated();
        $pegawai = Pegawai::where('id', $data['id'])->first();
        if (!$pegawai) {
            return redirect()->back()->withErrors(['error', 'Data pegawai tidak ada']);
        }
        $pegawai->fill($data);
        $pegawai->save();
        return redirect("/pegawai");
    }

    public function deletePegawai($id)
    {
        AbsenPegawai::where('pegawai_id', $id)->delete();
        totalGaji::where('pegawai_id', $id)->delete();
        Pegawai::where('id', $id)->delete();
        return redirect("/pegawai");
    }

    public function absenView()
    {
        $absen = AbsenPegawai::where('tanggal', now()->toDateString())->get();
        return view("admin.absen", compact('absen'));
    }

    public function pegawaiView()
    {
        $pegawai = Pegawai::all();
        return view("admin.pegawai", compact('pegawai'));
    }

    public function adminView()
    {
        $admin = Admin::with(['user'])->get();
        return view('admin.admin', compact('admin'));
    }

    public function gajiPegawaiView()
    {
        $pegawai = Pegawai::all();
        $result = [];
        foreach ($pegawai as $p) {
            $jumlahTidakAbsen = AbsenPegawai::where('pegawai_id', $p->id)->where("status", "belom absen")->count();
            $jumlahTelat = AbsenPegawai::where('pegawai_id', $p->id)->where("on_time", "N")->count();
            $totalAbsen = $jumlahTidakAbsen * 10000;
            $totalTelat = $jumlahTelat * 10000;
            $totalGajiBulanIni = $p->gaji - $totalAbsen - $totalTelat;
            $totalGaji = totalGaji::where('pegawai_id', $p->id)->whereMonth("tanggal", now()->format("m"))->get();
            $s = totalGaji::where('pegawai_id', $p->id)->whereMonth("tanggal", now()->format("m"))->first();
            $s->total = $totalGajiBulanIni;
            $s->save();
            $result[] = [
                'nama' => $p->nama,
                'total_gaji' => $totalGajiBulanIni,
                'tanggal' => now()->format("F")
            ];
        }
        return view("admin.gajiPegawai", compact("result"));
    }

    public function cetakGajiBulanan()
    {
        $pegawai = Pegawai::all();
        $result = [];
        foreach ($pegawai as $p) {
            $jumlahTidakAbsen = AbsenPegawai::where('pegawai_id', $p->id)->where("status", "belom absen")->count();
            $jumlahTelat = AbsenPegawai::where('pegawai_id', $p->id)->where("on_time", "N")->count();
            $totalAbsen = $jumlahTidakAbsen * 10000;
            $totalTelat = $jumlahTelat * 10000;
            $totalGajiBulanIni = $p->gaji - $totalAbsen - $totalTelat;
            $totalGaji = totalGaji::where('pegawai_id', $p->id)->whereMonth("tanggal", now()->format("m"))->get();
            foreach ($totalGaji as $t) {
                $s = totalGaji::where('pegawai_id', $p->id)->whereMonth("tanggal", now()->format("m"))->first();
                $s->total = $totalGajiBulanIni;
                $s->save();
                $result[] = [
                    'nama' => $p->nama,
                    'total_gaji' => $totalGajiBulanIni,
                    'tanggal' => $t->tanggal
                ];
            }
        }
        $data = [
            'result' => $result
        ];
        $pdf = Pdf::loadView("print.gajiBulanan", $data);
        return $pdf->download('gajiBulanan.pdf');
    }

    public function cetakAbsenBulanan()
    {
        $absen = AbsenPegawai::where('tanggal', now()->toDateString())->get();
        $data = [
            'absen' => $absen
        ];
        $pdf = Pdf::loadView("print.absenBulanan", $data);
        return $pdf->download('absenBulanan.pdf');
    }

    public function cetakPegawai()
    {
        $pegawai = Pegawai::all();
        $data = [
            'pegawai' => $pegawai
        ];
        $pdf = Pdf::loadView("print.pegawai", $data);
        return $pdf->download('pegawai.pdf');
    }
}
