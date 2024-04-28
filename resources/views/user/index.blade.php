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
                  <button type="button" class="btn btn-success btn-sm float mt-3" data-toggle="modal" data-target="#modalTambahuserData">
                    <i class="fas fa-plus"></i> Tambah Data
                  </button>

                 
                
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                 {{-- pesan error --}}
                 @if (Session::has('success'))
                 <div class="pt-3">
                   <div class="alert alert-success">
                     {{ Session::get('success') }}
                   </div>
                 </div>
             @endif

             @if ($errors->any())
                 <div class="pt-3">
                   <div class="alert alert-danger">
                     <ul>
                       @foreach ($errors->all() as $item)
                           <li>{{ $item }}</li>
                       @endforeach
                     </ul>
                   </div>
                 </div>
             @endif
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
                        <button class="btn btn-warning btn-sm float" data-toggle="modal" data-target="#modalEdituserData{{ $item->id }}"><i class="fas fa-edit"></i> Ubah</button>
                        <button class="btn btn-danger btn-sm float" data-toggle="modal"><i class="fas fa-delete"></i> Hapus</button>
                        
                      </td>
                    </tr>
                        
                  @endif 
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              @include('user.create')
              @include('user.edit')
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
