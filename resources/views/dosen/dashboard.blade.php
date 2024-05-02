@extends('main')

@section('container')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Jadwal Kuliah</h3>
        
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                {{-- <div class="card"> --}}
                  {{-- <div class="card-header">
    
                    
                  </div> --}}
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Juma'at</th>
                                <th>Sabtu</th>
                                <th>Minggu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalkuliah as $jadwal)
                                <tr>
                                    <td>
                                      @if ($jadwal->jadwalkuliah->hari->name == 'senin')
                                         <p>{{ $jadwal->jadwalkuliah->matakuliah->kode_matakuliah }} - {{ $jadwal->jadwalkuliah->matakuliah->name }} </br> Jam : {{ $jadwal->jadwalkuliah->jam_ke }} </br> Ruangan : {{ $jadwal->jadwalkuliah->ruangan->name }}
                                        </p>
                                      @endif
                                    </td>
                                    <td>
                                      @if ($jadwal->jadwalkuliah->hari->name == 'selasa')
                                         <p>{{ $jadwal->jadwalkuliah->matakuliah->kode_matakuliah }} - {{ $jadwal->jadwalkuliah->matakuliah->name }} </br> Jam : {{ $jadwal->jadwalkuliah->jam_ke }} </br> Ruangan : {{ $jadwal->jadwalkuliah->ruangan->name }}
                                        </p>
                                      @endif
                                    </td>
                                    <td>
                                      @if ($jadwal->jadwalkuliah->hari->name == 'rabu')
                                         <p>{{ $jadwal->jadwalkuliah->matakuliah->kode_matakuliah }} - {{ $jadwal->jadwalkuliah->matakuliah->name }} </br> Jam : {{ $jadwal->jadwalkuliah->jam_ke }} </br> Ruangan : {{ $jadwal->jadwalkuliah->ruangan->name }}
                                        </p>
                                      @endif
                                    </td>
                                    <td>
                                      @if ($jadwal->jadwalkuliah->hari->name == 'kamis')
                                         <p>{{ $jadwal->jadwalkuliah->matakuliah->kode_matakuliah }} - {{ $jadwal->jadwalkuliah->matakuliah->name }} </br> Jam : {{ $jadwal->jadwalkuliah->jam_ke }} </br> Ruangan : {{ $jadwal->jadwalkuliah->ruangan->name }}
                                        </p>
                                      @endif
                                    </td>
                                    <td>
                                      @if ($jadwal->jadwalkuliah->hari->name == 'jumat')
                                         <p>{{ $jadwal->jadwalkuliah->matakuliah->kode_matakuliah }} - {{ $jadwal->jadwalkuliah->matakuliah->name }} </br> Jam : {{ $jadwal->jadwalkuliah->jam_ke }} </br> Ruangan : {{ $jadwal->jadwalkuliah->ruangan->name }}
                                        </p>
                                      @endif
                                    </td>
                                    <td>
                                      @if ($jadwal->jadwalkuliah->hari->name == 'sabtu')
                                         <p>{{ $jadwal->jadwalkuliah->matakuliah->kode_matakuliah }} - {{ $jadwal->jadwalkuliah->matakuliah->name }} </br> Jam : {{ $jadwal->jadwalkuliah->jam_ke }} </br> Ruangan : {{ $jadwal->jadwalkuliah->ruangan->name }}
                                        </p>
                                      @endif
                                    </td>
                                    <td>
                                      @if ($jadwal->jadwalkuliah->hari->name == 'minggu')
                                         <p>{{ $jadwal->jadwalkuliah->matakuliah->kode_matakuliah }} - {{ $jadwal->jadwalkuliah->matakuliah->name }} </br> Jam : {{ $jadwal->jadwalkuliah->jam_ke }} </br> Ruangan : {{ $jadwal->jadwalkuliah->ruangan->name }}
                                        </p>
                                      @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>                
                    </table>
                {{-- </div> --}}
                
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
        
        
      </div>
      <!-- /.card-body -->
      {{-- <div class="card-footer">
        Footer
      </div> --}}
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    
  </section>
  @endsection