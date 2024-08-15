@extends('layout.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pegawai</h6>
            <div class="grid gap-2">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                    data-bs-whatever="@mdo">Tambah Pegawai</button>
                <a href="/cetakPegawai">
                    <button type="button" class="btn btn-danger">Cetak Laporan</button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tempat Tinggal</th>
                            <th>Posisi</th>
                            <th>Gaji</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->tempat_tinggal }}</td>
                                <td>{{ $p->posisi }}</td>
                                <td>{{ number_format($p->gaji), 0, ',', '.' }}</td>
                                <td>
                                    <div class="d-flex justify-start">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                data-id={{ $p->id }} data-nama="{{ $p->nama }}"
                                                data-tempat-tinggal="{{ $p->tempat_tinggal }}"
                                                data-posisi="{{ $p->posisi }}"
                                                data-gaji={{ $p->gaji }}>Edit</button>
                                        </div>
                                        <div class="mr-2">
                                            <form action="/deletePegawai/{{ $p->id }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/editPegawai" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="recipient-name" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tempat Tinggal:</label>
                                <input type="text" class="form-control" id="recipient-tempat_tinggal"
                                    name="tempat_tinggal">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Posisi:</label>
                                <input type="text" class="form-control" id="recipient-posisi" name="posisi">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Gaji:</label>
                                <input type="text" class="form-control" id="recipient-gaji" name="gaji">
                            </div>
                            <input type="text" name="id" id="recipient-id" hidden>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Tambah Pegawai -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/addPegawai" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="recipient-name" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tempat Tinggal:</label>
                                <input type="text" class="form-control" id="recipient-name" name="tempat_tinggal">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Posisi:</label>
                                <input type="text" class="form-control" id="recipient-name" name="posisi">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Gaji:</label>
                                <input type="text" class="form-control" id="recipient-name" name="gaji">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget
            const id = button.getAttribute('data-id')
            const nama = button.getAttribute('data-nama')
            const tempat_tinggal = button.getAttribute('data-tempat-tinggal')
            const posisi = button.getAttribute('data-posisi')
            const gaji = button.getAttribute('data-gaji')
            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalBodyInputNama = exampleModal.querySelector('#recipient-name')
            const modalBodyInputTempatTinggal = exampleModal.querySelector('#recipient-tempat_tinggal')
            const modalBodyInputPosisi = exampleModal.querySelector('#recipient-posisi')
            const modalBodyInputGaji = exampleModal.querySelector('#recipient-gaji')
            const modalBodyInputId = exampleModal.querySelector('#recipient-id')
            modalBodyInputNama.value = nama
            modalBodyInputTempatTinggal.value = tempat_tinggal
            modalBodyInputPosisi.value = posisi
            modalBodyInputGaji.value = gaji
            modalBodyInputId.value = id
            console.log(nama);
            exampleModal.querySelector('form').setAttribute('data-id', id)
        })
        const exampleModal1 = document.getElementById('exampleModal1')
        exampleModal1.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget
            const recipient = button.getAttribute('data-bs-whatever')
            const modalTitle = exampleModal1.querySelector('.modal-title')
            const modalBodyInput = exampleModal1.querySelector('.modal-body input')
        })
    </script>
@endsection
