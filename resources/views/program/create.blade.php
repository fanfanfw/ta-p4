<div class="modal fade" id="modalTambahData">
  <form method="POST" action="{{ url('program') }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h4 class="modal-title">Tambah Program Studi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          
        </div>
        <div class="modal-body">
            @csrf
            <div class="form-group">
              <label for="nama">Program Studi:</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputnama"  name="name" value="{{ Session::get('name') }}" placeholder="Masukan Program Studi" required>
              @error ('name')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
              @enderror
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->