@extends('layout.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Admin</h6>
        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo">Tambah Admin</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($admin as $a)
                    <tr>
                        <td>{{$a->user->nama}}</td>
                        <td>{{$a->user->password}}</td>
                        <td class="">
                          <div class="d-flex justify-start">
                            <div class="mr-2">
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                              data-bs-target="#exampleModal" 
                              data-id="{{ $a->user_id }}" 
                              data-nama="{{ $a->user->nama }}" 
                              id="button"
                              data-password="{{ $a->user->password }}">Edit</button>
                            </div>
                            <div class="mr-2">
                              <form action="/deleteAdmin/{{$a->user_id}}" method="post" class="">
                                @csrf
                                <button class="btn btn-danger" >Hapus</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="/editAdmin">
                @csrf
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama:</label>
                  <input type="text" class="form-control" id="recipient-name" name="nama">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Password:</label>
                  <input type="password" class="form-control" id="recipient-password" name="password">
                </div>
                <input type="text" id="recipient-id" name="id" hidden>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
     <!-- Tambah admin -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama:</label>
                  <input type="text" class="form-control" id="recipient-name1" name="nama">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Password:</label>
                  <input type="password" class="form-control" id="recipient-password1" name="password">
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
  exampleModal.addEventListener('show.bs.modal', function (event) {
  const button = event.relatedTarget
  const id = button.getAttribute('data-id')
  const nama = button.getAttribute('data-nama')
  const password = button.getAttribute('data-password')
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalBodyInputNama = exampleModal.querySelector('#recipient-name')
  const modalBodyInputPassword = exampleModal.querySelector('#recipient-password')
  const modalBodyInputId = exampleModal.querySelector('#recipient-id')
  modalBodyInputNama.value = nama
  modalBodyInputPassword.value = password
  modalBodyInputId.value = id
  exampleModal.querySelector('form').setAttribute('data-id', id)
})
const exampleModal1 = document.getElementById('exampleModal1')
exampleModal1.addEventListener('show.bs.modal', function (event) {
  const button = event.relatedTarget
  const recipient = button.getAttribute('data-bs-whatever')
  const modalTitle = exampleModal1.querySelector('.modal-title')
  const modalBodyInput = exampleModal1.querySelector('.modal-body input')
})
</script>
@endsection