@extends('layout.headerPrint')
@section('table')
    <table>
        <thead class="">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat Tinggal</th>
                <th>Posisi</th>
                <th>Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->tempat_tinggal }}</td>
                    <td>{{ $p->posisi }}</td>
                    <td>{{ number_format($p->gaji), 0, ',', '.' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
