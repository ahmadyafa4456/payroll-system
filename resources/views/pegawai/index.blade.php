@extends('layout.main_pegawai')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Absen</h6>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>On Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$absenPegawai->pegawai->nama}}</td>
                        <td>{{$absenPegawai->absen_masuk}}</td>
                        <td>{{$absenPegawai->absen_keluar}}</td>
                        <td>{{$absenPegawai->on_time}}</td>
                        <td>{{$absenPegawai->status}}</td>
                        <td>
                            @if (empty($absenPegawai->absen_masuk))
                            <form action="/absenMasuk/{{$absenPegawai->pegawai_id}}" method="post">
                                @csrf
                                <button class="btn btn-danger">Absen Masuk</button>
                            </form>
                            @elseif(empty($absenPegawai->absen_keluar))
                            <form action="/absenKeluar/{{$absenPegawai->pegawai_id}}" method="post">
                                @csrf
                                <button class="btn btn-danger">Absen Keluar</button>
                            </form>
                            @else
                            Sudah Absen
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection