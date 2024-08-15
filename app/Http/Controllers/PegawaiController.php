<?php

namespace App\Http\Controllers;

use App\Models\AbsenPegawai;
use App\Models\Pegawai;
use App\Models\totalGaji;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PegawaiController extends Controller
{
    public function select()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.pilih', compact('pegawai'));
    }

    public function index(Request $request)
    {
        Session::put('id', $request->query('id'));
        $id = Session::get('id');
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $absenKemarin = AbsenPegawai::where('pegawai_id', $id)->where('tanggal', $yesterday)->first();
        $absenPegawai = AbsenPegawai::where('pegawai_id', $id)->where('tanggal', now()->toDateString())->first();
        $totalGaji = totalGaji::where('pegawai_id', $id)->whereMonth('tanggal', now()->format("m"))->first();
        if (!$absenKemarin) {
            $absenKemarin = new AbsenPegawai();
            $absenKemarin->pegawai_id = $id;
            $absenKemarin->status = "belum absen";
            $absenKemarin->tanggal = $yesterday;
            $absenKemarin->save();
        }
        if (!$absenPegawai) {
            $absenPegawai = new AbsenPegawai();
            $absenPegawai->pegawai_id = $id;
            $absenPegawai->status = "belum absen";
            $absenPegawai->tanggal = now()->toDateString();
            $absenPegawai->save();
        }
        if (!$totalGaji) {
            $totalGaji = new totalGaji();
            $totalGaji->pegawai_id = $id;
            $totalGaji->tanggal = now()->toDateString();
            $totalGaji->save();
        }
        return view("pegawai.index", compact('absenPegawai'));
    }

    public function absenMasuk($id)
    {

        $batasWaktu = "09:15:00";
        $waktuMasuk = Carbon::now()->toTimeString();
        $absenPegawai = AbsenPegawai::where('pegawai_id', $id)->where('tanggal', now()->toDateString())->first();
        $absenPegawai->absen_masuk = $waktuMasuk;
        $absenPegawai->on_time = $waktuMasuk > $batasWaktu ? "N" : "Y";
        $absenPegawai->save();
        return redirect("/pegawai-absen?id=$absenPegawai->pegawai_id");
    }

    public function absenKeluar($id)
    {
        $waktuKeluar = Carbon::now()->toTimeString();
        $absenPegawai = AbsenPegawai::where('pegawai_id', $id)->where('tanggal', now()->toDateString())->first();
        $absenPegawai->absen_keluar = $waktuKeluar;
        $absenPegawai->status = "Absen";
        $absenPegawai->save();
        return redirect("/pegawai-absen?id=$absenPegawai->pegawai_id");
    }

    public function history(Request $request)
    {
        $hariIni = Carbon::now()->format('Y-m-d');
        $absen = AbsenPegawai::when($request->date != null, function ($q) use ($request) {
            return $q->whereDate('tanggal', $request->date);
        }, function ($q) use ($hariIni) {
            return $q->whereDate('tanggal', $hariIni);
        })->when($request->id != null, function ($q) use ($request) {
            return $q->where('pegawai_id', $request->id);
        })->first();
        return view('pegawai.history', compact('absen'));
    }
}
