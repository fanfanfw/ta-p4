@foreach ($ruangan as $item)

<div class="modal fade" id="modalEditruanganData{{ $item->id }}">
  <form action='{{ url('ruangan/'.$item->id) }}' method='post'>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title">Mengubah Data Ruangan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @method('PUT')
            @csrf
            {{-- nama ruangan --}}
            <div class="form-group">
              <label for="nama">Ruangan:</label>
              <input type="text" class="form-control" id="inputnama" name="name" value="{{ $item->name }}" placeholder="Masukan Program Studi" autofocus>
              @error ('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
          </div>
          {{-- nama ruangan end --}}
          {{-- kapasitas --}}
          <div class="form-group">
            <label for="kapasitas">Kapasitas:</label>
            <input type="number" class="form-control" id="inputnama" name="kapasitas" value="{{ $item->kapasitas }}" placeholder="Masukan Jumlah Kapasitas Ruangan" autofocus>
              @error ('kapasitas')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            {{-- kapasitas End --}}
  
             <!-- /.card-body -->
            </div>
            {{-- kapasitas end --}}
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
          </div>
        </div>
      </div>
     @endforeach