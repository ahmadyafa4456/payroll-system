@extends('layout.headerPrint')
@section('table')
<table>
    <thead class="">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Total Gaji</th>
        <th>Bulan</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($result as $r)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$r['nama']}}</td>
            <td>{{number_format($r['total_gaji'], 0, ',', '.')}}</td>
            <td>{{$r['tanggal']}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection