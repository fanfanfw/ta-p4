@foreach ($kelas as $item)

<div class="modal fade" id="modalEditkelasData{{ $item->id }}">
  <form action='{{ url('kelas/'.$item->id) }}' method='post'>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title">Mengubah Kelas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @method('PUT')
            @csrf
            <div class="form-group">
              <label for="nama">Kelas:</label>
              <input type="text" class="form-control" id="inputnama" name="name" value="{{ $item->name }}" placeholder="Masukan Program Studi" autofocus>
            </div>
            @error ('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  @endforeach