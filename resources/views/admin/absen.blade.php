@extends('layout.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Absensi</h6>
            <a href="cetakAbsenBulanan">
                <button type="button" class="btn btn-danger">Cetak Laporan</button>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Absen Masuk</th>
                            <th>Absen Keluar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absen as $b)
                            <tr>
                                <td>{{ $b->pegawai->nama }}</td>
                                <td>{{ $b->absen_masuk }}</td>
                                <td>{{ $b->absen_keluar }}</td>
                                <td>{{ $b->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
