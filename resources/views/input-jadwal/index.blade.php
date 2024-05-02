@extends('main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            
          
            <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title">Inputan Jadwal Kuliah</h3>
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
                    <th>Nama User</th>
                    <th>NIM / NIDN</th>
                    <th>Role</th>
                    <th>Program Studi</th>
                    <th>Ruangan</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($jadwal as $item)
                         
                     <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $item->matakuliah->kode_matakuliah }}</td>
                       <td>{{ $item->matakuliah->name }}</td>
                      <td>{{ $item->matakuliah->namadosen->name }}</td>
                      <td>{{ $item->matakuliah->ProgramStudi->name }}</td>
                      <td>{{ $item->ruangan->name }}</td>
                      <td>{{ $item->hari->name }}</td>
                      <td>{{ $item->jams->name }}</td>
                      <td>{{ $item->kelas->name }}</td>
                      <td>
                        <button class="btn btn-warning btn-sm float" data-toggle="modal" data-target="#modalEditjadwalData{{ $item->id }}"><i class="fas fa-edit"></i> Ubah</button>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('jadwal/'.$item->id) }}" method="post">
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
              @include('jadwal.create')
              @include('jadwal.edit')
            </div>
            <!-- /.card -->

            <div class="card mt-3">
              <div class="card-header">
                  <h3 class="card-title">Jadwal Kuliah</h3>
                  
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Jam</th>
                              <th>Senin</th>
                              <th>Selasa</th>
                              <th>Rabu</th>
                              <th>Kamis</th>
                              <th>Jumat</th>
                              <th>Sabtu</th>
                              <th>Minggu</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($jam as $item)
                      <tr>
                            <td>{{ $item->name }}</td>
                            @foreach ($hari as $hariItem)
                                @php
                                    $jadwalKuliah = $jadwal->where('hari_id', $hariItem->id)->where('jam_id', $item->id);
                                @endphp
                                <td>
                                    @foreach ($jadwalKuliah as $kuliah)
                                      <b> {{ $kuliah->matakuliah->name }}</b> - {{ $kuliah->matakuliah->namadosen->name }} - {{ $kuliah->ruangan->name }} - {{ $kuliah->Kelas->name }} <br>
                                    @endforeach
                                </td>
                            @endforeach
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
              </div>
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

