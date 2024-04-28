@extends('main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data User Dosen & Mahasiswa</h3>
                <br>

                <!-- Tombol untuk membuka modal -->
                  <button type="button" class="btn btn-success btn-sm float mt-3" data-toggle="modal" data-target="#modalTambahData">
                    <i class="fas fa-plus"></i> Tambah Data
                  </button>

                  <!-- Modal untuk menambah data -->
                  <div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- /.card-header -->
                          <!-- form start -->
                        <form action="/pages/admin/dosen" method="POST">
                          @csrf
                            <div class="form-group">
                              <label for="nama">Nama Dosen:</label>
                              <input type="text" class="form-control" id="inputnama"  name="name" value="{{ old('name') }}" placeholder="Masukan Nama">
                              @error ('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group"> 
                              <label for="nidn">NIDN:</label>
                              <input type="text" class="form-control" id="inputusername" name="username" placeholder="Masukan NIDN">
                              @error ('username')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password:</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                              @error ('password')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="status">Role:</label>
                              <select class="form-control select2" id="role" name="role">
                                <option value="dosen">Dosen</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                            </div>
                         <!-- /.card-body -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary">Buat</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal untuk mengedit data -->
                <div class="modal fade" id="modalEditData" tabindex="-1" role="dialog" aria-labelledby="modalEditDataLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalEditDataLabel">Edit Data Dosen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Form untuk mengedit data -->
                        <form action="/pages/admin/dosen/edit/{{ $user->id }}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label for="editnama">Nama Dosen:</label>
                            <input type="text" class="form-control" id="editnama" name="edit_name" value="{{ $user->name }}" placeholder="Masukan Nama">
                          </div>
                          <div class="form-group">
                            <label for="editnidn">NIDN:</label>
                            <input type="text" class="form-control" id="editnidn" name="edit_username" value="{{ $user->username }}" placeholder="Masukan NIDN">
                          </div>
                          <div class="form-group">
                            <label for="editrole">Role:</label>
                            <select class="form-control select2" id="editrole" name="edit_role">
                              <option value="dosen" @if($user->role == 'dosen') selected @endif>Dosen</option>
                              <option value="mahasiswa" @if($user->role == 'mahasiswa') selected @endif>Mahasiswa</option>
                            </select>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($user as $item)
                    @if ($item->role == 'mahasiswa' || $item->role == 'dosen')
                         
                     <tr>
                       <td>{{ $counter++ }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->username }}</td>
                      <td>{{ $item->role }}</td>
                      <td>
                        <button class="btn btn-warning btn-sm float" data-toggle="modal" data-target="#modalEditData"><i class="fas fa-edit"></i> Ubah</button>
                        <button class="btn btn-danger btn-sm float" data-toggle="modal"><i class="fas fa-delete"></i> Hapus</button>
                        
                      </td>
                    </tr>
                        
                  @endif 
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
              <!-- /.card-body -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> --}}

  <!-- Control Sidebar -->
  {{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside> --}}
  <!-- /.control-sidebar -->
</div>
@endsection

<!-- ./wrapper -->
<!-- Page specific script -->
