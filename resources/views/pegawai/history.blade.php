@extends('layout.main_pegawai')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">History</h6>
        <div>
            <form action="/pegawai-history" method="get" class="d-flex justify-content-start">
                <div class="mr-2">
                    <input type="date" class="form-control" name="date" value="{{date('Y-m-d')}}"/>
                    <input name="id" value="{{session('id')}}" hidden>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @if (empty($absen))
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        @else
                        <td>{{$absen->pegawai->nama}}</td>
                        <td>{{$absen->absen_masuk}}</td>
                        <td>{{$absen->absen_keluar}}</td>
                        <td>{{$absen->on_time}}</td>
                        <td>{{$absen->status}}</td>   
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection