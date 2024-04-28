@extends('main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Program Studi</h3>
                <br>
                <!-- Tombol untuk membuka modal -->
                <button type="button" class="btn btn-success btn-sm float mt-3" data-toggle="modal" data-target="#modalTambahData">
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No. </th>
                    <th style="width: 80%">Program Studi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($program as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->name }}</td>
                          <td>
                            <button class="btn btn-warning btn-sm float" data-toggle="modal" data-target="#modalEditData{{ $item->id }}"><i class="fas fa-edit"></i> Ubah</button>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('program/'.$item->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm float">Del </button>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            @include('program.create')
            @include('program.edit')
            
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
{{-- @section('kode')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
$(function () {
  bsCustomFileInput.init();
});
</script>
@endsection --}}