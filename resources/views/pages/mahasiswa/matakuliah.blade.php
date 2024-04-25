@extends('main')

@section('container')
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Matakuliah </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Matakuliah</li>
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
        <h3 class="card-title">Matakuliah yang Diambil</h3>
        
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
                  <div class="card-header">
                  <div class="form-group mb-3">
                    <label for="semester">Pilih Semester:</label>
                    <select class="form-control" id="semester" name="semester">
                      <option value="1">Semester 1</option>
                      <option value="2">Semester 2</option>
                      <option value="3">Semester 3</option>
                      <option value="4">Semester 4</option>
                      <option value="5">Semester 5</option>
                      <option value="6">Semester 6</option>
                      <option value="7">Semester 7</option>
                      <option value="8">Semester 8</option>
                    </select>
                  </div>
                  <table id="example2" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Kode Matakuliah</th>
                              <th>Nama Matakuliah</th>
                              <th>Nama Dosen</th>
                              <th>SKS</th>
                              <th>Semester</th>
                              <th>Program Studi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($usermatakuliah as $matakuliah)
                          @if ($matakuliah->usermatakuliah->semester == '1')
                                  <tr>
                                      <td>
                                           {{ $matakuliah->usermatakuliah->id}}
                                      </td>
                                      <td>
                                           {{ $matakuliah->usermatakuliah->kode_matakuliah }}
                                        </td>
                                        <td>
                                            {{ $matakuliah->usermatakuliah->name }}
                                         </td>
                                         <td>
                                            {{ $matakuliah->usermatakuliah->namaDosen->name }}
                                         </td>
                                         <td>
                                             {{ $matakuliah->usermatakuliah->sks }}
                                            </td>
                                            <td>
                                                {{ $matakuliah->usermatakuliah->semester }}
                                            </td>
                                            <td>
                                               {{ $matakuliah->usermatakuliah->programStudi->name }}
                                            </td>
                                    </tr>
                            @endif
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