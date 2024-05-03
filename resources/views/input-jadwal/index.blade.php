@extends('main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            
          
            <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title">Inputan Jadwal Mahasiswa</h3>
                <br>
                
                <!-- Tombol untuk membuka modal -->
                  <button type="button" class="btn btn-success btn-sm float mt-3" data-toggle="modal" data-target="#modalTambahjadwalData">
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
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Matakuliah</th>
                    <th>Dosen</th>
                    <th>Dosen</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($usermatakuliah as $item)
                    @if ($item->user->role == 'mahasiswa')
                     <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $item->user->name }}</td>
                       <td>{{ $item->user->username }}</td>
                       <td>{{ $item->matakuliah->name }}</td>
                       <td>{{ $item->matakuliah->ProgramStudi->name }}</td>
                       <td>{{ $item->matakuliah->namadosen->name }}</td>
                       <td>{{ $item->matakuliah->jadwalKuliahs->first()->kelas->name }}</td>
                       <td>
                        @foreach($item->matakuliah->jadwalKuliahs as $jadwal)
                        <ul>
                          <li><b>Hari: </b>{{ $jadwal->hari->name }} </br> <b>Jam: </b>{{ $jadwal->jam->name }}</li>
                          </ul>
                        @endforeach
                       </td>
                       <td>
                        <button class="btn btn-warning btn-sm float" data-toggle="modal" data-target="#modalEditjadwalData{{ $item->id }}"><i class="fas fa-edit"></i> Ubah</button>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('jadwal/'.$item->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                        <button class="btn btn-danger btn-sm float" type="submit" name="submit"><i class="fas fa-delete"></i> Hapus</button>
                      </form>
                      </td>
                    </tr>
                    
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              @include('input-jadwal.create')
              @include('input-jadwal.edit')
            </div>
            
            
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

  <!-- /.control-sidebar -->
</div>
@endsection

