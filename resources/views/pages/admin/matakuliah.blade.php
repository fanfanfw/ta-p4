@extends('main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Matakuliah</h3>
                <br>

                <!-- Tombol untuk membuka modal -->
                  <button type="button" class="btn btn-success btn-sm float mt-3" data-toggle="modal" data-target="#modalTambahData">
                    <i class="fas fa-plus"></i> Tambah Data
                  </button>

                  <div class="modal fade" id="modalTambahData">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Program Studi</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="{{ route('program.create') }}">
                            @csrf
                            <div class="form-group">
                              <label for="nama">Program Studi:</label>
                              <input type="text" class="form-control" id="inputnama" name="name" value="" placeholder="Masukan Program Studi" autofocus>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <div class="modal fade" id="modalEditData">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Program Studi</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="{{ route('program.create') }}">
                            @csrf
                            <div class="form-group">
                              <label for="nama">Program Studi:</label>
                              <input type="text" class="form-control" id="inputnama" name="name" value="{{ old('name') }}" placeholder="Masukan Program Studi" autofocus>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                      </form>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No. </th>
                    <th>Kode Matakuliah</th>
                    <th>Matakuliah</th>
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
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->kode_matakuliah }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->namaDosen->name }}</td>
                            <td>{{ $item->programStudi->name }}</td>
                            <td>{{ $item->sks }}</td>
                            <td>{{ $item->semester }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm float mt-3" data-toggle="modal" data-target="#modalEditData"><i class="fas fa-edit"></i> Ubah</button>
                                <button class="btn btn-danger btn-sm float mt-3" data-toggle="modal"><i class="fas fa-delete"></i> Hapus</button>
                                {{-- {{ route('program.edit', $item->id) }} --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>                
                </table>
              </div>
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
@endsection

<!-- ./wrapper -->
@section('kode')
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
@endsection