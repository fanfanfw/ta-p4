@extends('main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title">Data Matakuliah</h3>
                <br>
                
                <!-- Tombol untuk membuka modal -->
                  <button type="button" class="btn btn-success btn-sm float mt-3" data-toggle="modal" data-target="#modalTambahmatakuliahData">
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

                              @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

              
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <th>Nama Dosen</th>
                    <th>Program Studi</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($matakuliah as $item)
                         
                     <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $item->kode_matakuliah }}</td>
                       <td>{{ $item->name }}</td>
                      <td>{{ $item->namaDosen->name }}</td>
                      <td>{{ $item->ProgramStudi->name }}</td>
                      <td>{{ $item->sks }}</td>
                      <td>{{ $item->semester }}</td>
                      <td>
                        <button class="btn btn-warning btn-sm float" data-toggle="modal" data-target="#modalEditmatakuliahData{{ $item->id }}"><i class="fas fa-edit"></i> Ubah</button>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('matakuliah/'.$item->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                        <button class="btn btn-danger btn-sm float" type="submit" name="submit"><i class="fas fa-delete"></i> Hapus</button>
                      </form>
                      </td>
                    </tr>
                        
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              @include('matakuliah.create')
              @include('matakuliah.edit')
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
