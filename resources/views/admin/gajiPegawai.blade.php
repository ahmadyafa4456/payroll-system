@extends('layout.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Gaji Bulanan Pegawai</h6>
            <a href="/cetakGajiBulanan">
                <button type="button" class="btn btn-danger">Cetak Laporan</button>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Total Gaji</th>
                            <th>Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $r)
                            <tr>
                                <td>{{ $r['nama'] }}</td>
                                <td>{{ number_format($r['total_gaji'], 0, ',', '.') }}</td>
                                <td>{{ $r['tanggal'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
