@extends('layout.headerPrint')
@section('table')
    <table>
        <thead class="">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Absen Masuk</th>
                <th>Absen Keluar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absen as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->pegawai->nama }}</td>
                    <td>{{ $b->absen_masuk }}</td>
                    <td>{{ $b->absen_keluar }}</td>
                    <td>{{ $b->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
