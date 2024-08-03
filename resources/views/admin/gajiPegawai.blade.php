@extends('layout.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pegawai</h6>
        <button type="button" class="btn btn-danger">Cetak Laporan</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah Absen</th>
                        <th>Jumlah Terlambat Absen</th>
                        <th>Jumlah Tidak Absen</th>
                        <th>Total Gaji</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Tiger Nixon</td>
                        <td>$320,800</td>
                        <td>
                            <button type="button" class="btn btn-danger">Hapus</button>
                            <button type="button" class="btn btn-danger">Cetak</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection