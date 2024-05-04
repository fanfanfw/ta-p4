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
        <h3 class="card-title">Matakuliah yang Diajar</h3>
        
       
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
                      <option value="Semua">Semua</option>
                    </select>
                  </div>
                  {{-- <div class="card-tools">
                    
                    
                    
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div> --}}
                  <table id="semester" name="semester" class="table table-bordered table-hover">
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
                        @foreach ($userMatakuliah as $item)
                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->matakuliah->kode_matakuliah }}</td>
                            <td>{{ $item->matakuliah->name }}</td>
                            <td>{{ $item->matakuliah->namadosen->name }}</td>
                            <td>{{ $item->matakuliah->sks }}</td>
                            <td>{{ $item->matakuliah->semester }}</td>
                            <td>{{ $item->matakuliah->programStudi->name }}</td>
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
  <script>
    document.getElementById('semester').addEventListener('change', function() {
        var selectedSemester = this.value;
        var rows = document.querySelectorAll('#semester tbody tr');
    
        rows.forEach(function(row) {
            var semester = row.querySelector('td:nth-child(6)').textContent.trim();
            if (semester === selectedSemester || selectedSemester === 'Semua') {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    </script>
  @endsection