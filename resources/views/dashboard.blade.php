@extends('main')

@section('container')
    
{{-- !-- Content Header (Page header) --> --}}
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
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
  {{-- Information --}}
  <section class="content" >
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $totalDosen }}</h3>

            <p>Dosen</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-friends"></i>
          </div>
          <a href="/user" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $totalMatakuliah }}</h3>

            <p>MataKuliah</p>
          </div>
          <div class="icon">
            <i class="fas fa-book"></i>
          </div>
          <a href="/matakuliah" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $totalProgramStudi }}</h3>

            <p>Program Studi</p>
          </div>
          <div class="icon">
            <i class="fas fa-thumbtack"></i>
          </div>
          <a href="/program" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $totalMahasiswa }}</h3>

            <p>Mahasiswa</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="/user" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $totalRuang }}</h3>

            <p>Ruang</p>
          </div>
          <div class="icon">
            <i class="fas fa-door-open"></i>
          </div>
          <a href="/ruangan" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $totalKelas }}</h3>

            <p>Kelas</p>
          </div>
          <div class="icon">
            <i class="fas fa-chalkboard"></i>
          </div>
          <a href="/kelas" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
  </section>
  <!-- Main content -->
  <section class="content">
    
    
    <!-- /.card -->

  </section>
  @endsection
