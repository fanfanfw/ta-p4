@foreach ($jadwal as $item)
    
<div class="modal fade" id="modalEditjadwalData{{ $item->id }}">
  <form action="{{ url('jadwal/'.$item->id) }}" method="POST">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header bg-warning">
         <h5 class="modal-title" id="modalEditDataLabel">Mengubah Data Jadwal Kuliah</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        @method('PUT')
         @csrf
        

             {{-- Nama Matakuliah --}}
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Matakuliah:</label>
            <select class="form-control @error('matakuliah_id') is-invalid @enderror" id="matakuliah_id" name="matakuliah_id">
              <option value="">Pilih Matakuliah</option>
              @foreach ($matakuliah as $mata)
                  <option value="{{ $mata->id }}" {{ $mata->id == $item->matakuliah_id ? 'selected' : '' }}>{{ $mata->kode_matakuliah }} - {{ $mata->name }} - {{ $mata->namadosen->name }}</option>
              @endforeach
          </select>
            @error ('matakuliah_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          {{-- Nama Mtakuliah End --}}
            
             {{-- Ruangan --}}
             <div class="form-group">
              <label for="exampleInputPassword1">Ruangan:</label>
              <select class="form-control @error('ruangan_id') is-invalid @enderror" id="ruangan_id" name="ruangan_id">
                <option value="">Pilih Ruangan</option>
                @foreach ($ruangan as $ruang)
                    <option value="{{ $ruang->id }}" {{ $ruang->id == $item->ruangan_id ? 'selected' : '' }}>{{ $ruang->name }}</option>
                @endforeach
            </select>
              @error ('ruangan_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
             {{-- Ruangan End --}}

             {{-- hari --}}
             <div class="form-group">
              <label for="exampleInputPassword1">Hari:</label>
              <select class="form-control @error('hari_id') is-invalid @enderror" id="hari_id" name="hari_id">
                <option value="">Pilih Hari</option>
                @foreach ($hari as $haris)
                    <option value="{{ $haris->id }}" {{ $haris->id == $item->hari_id ? 'selected' : '' }}>{{ $haris->name }}</option>
                @endforeach
            </select>
              @error ('hari_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            {{-- hari End --}}

            {{-- jam --}}
            <div class="form-group">
              <label for="exampleInputPassword1">Jam:</label>
              <select class="form-control @error('jam_id') is-invalid @enderror" id="jam_id" name="jam_id">
                <option value="">Pilih Jam</option>
                @foreach ($jam as $jams)
                    <option value="{{ $jams->id }}" {{ $jams->id == $item->jam_id ? 'selected' : '' }}>{{ $jams->name }}</option>
                @endforeach
            </select>
              @error ('jam_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            {{-- jam end --}}


          <!-- /.card-body -->
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endforeach