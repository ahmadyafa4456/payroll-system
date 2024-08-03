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
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                            data-bs-target="#exampleModal" 
                            data-id="{{ $a->id }}" 
                            data-nama="{{ $a->user->nama }}" 
                            data-password="{{ $a->user->password }}">Edit</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
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
              <form>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama:</label>
                  <input type="text" class="form-control" id="recipient-name" name="nama">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Password:</label>
                  <input type="password" class="form-control" id="recipient-name" name="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Edit</button>
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
                  <input type="text" class="form-control" id="recipient-name" name="nama">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Password:</label>
                  <input type="password" class="form-control" id="recipient-name" name="password">
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
    var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  var id = button.getAttribute('data-id')
  var nama = button.getAttribute('data-nama')
  var password = button.getAttribute('data-password')
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInputNama = exampleModal.querySelector('#recipient-name')
  var modalBodyInputPassword = exampleModal.querySelector('#recipient-password')
  modalBodyInputNama.value = nama
  modalBodyInputPassword.value = password
  exampleModal.querySelector('form').setAttribute('data-id', id)
})
var exampleModal = document.getElementById('exampleModal1')
exampleModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  var recipient = button.getAttribute('data-bs-whatever')
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')
})
</script>
@endsection