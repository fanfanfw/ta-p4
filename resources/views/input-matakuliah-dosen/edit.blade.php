@foreach ($usermatakuliah as $item)
<div class="modal fade" id="modalEditinputjadwaldosenData{{ $item->id }}">
  <form action="{{ url('input-matakuliah-dosen/'.$item->id) }}" method="POST">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="modalEditDataLabel">Mengubah Data Matakuliah Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @method('PUT')
          @csrf

          {{-- Nama Mahasiswa --}}
          <div class="form-group">
            <label for="user_id">Nama Mahasiswa:</label>
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
              <option value="">Pilih Mahasiswa</option>
              @foreach ($lectures as $siswa)
                <option value="{{ $siswa->id }}" {{ $siswa->id == $item->user_id ? 'selected' : '' }}>{{ $siswa->username }} - {{ $siswa->name }}</option>
              @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          {{-- Nama Mahasiswa End --}}

          {{-- Nama Matakuliah --}}
          <div class="form-group">
            <label for="matakuliah_id">Nama Matakuliah:</label>
            <select class="form-control @error('matakuliah_id') is-invalid @enderror" id="matakuliah_id" name="matakuliah_id">
              <option value="">Pilih Matakuliah</option>
              @foreach ($matakuliah as $mata)
                <option value="{{ $mata->id }}" {{ $mata->id == $item->matakuliah_id ? 'selected' : '' }}>{{ $mata->kode_matakuliah }} - {{ $mata->name }} - {{ $mata->namadosen->name }}</option>
              @endforeach
            </select>
            @error('matakuliah_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          {{-- Nama Matakuliah End --}}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endforeach
