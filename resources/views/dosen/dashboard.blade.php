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
                  <div class="card mt-3">
              <div class="card-header">
                  <h3 class="card-title">Jadwal Mengajar</h3>
                  
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover">
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
                                  <b> {{ $kuliah->matakuliah->name }}</b> - {{ $kuliah->matakuliah->namadosen->name }} - {{ $kuliah->ruangan->name }} - {{ $kuliah->matakuliah->Kelas->name }} </br> </br>
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
      {{-- <div class="card-footer">
        Footer
      </div> --}}
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    
  </section>
  @endsection