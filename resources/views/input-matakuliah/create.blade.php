<div class="modal fade" id="modalTambahinputjadwalData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <form action="{{ url('input-matakuliah') }}" method="POST">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header bg-success text-white">
           <h5 class="modal-title" id="modalTambahDataLabel">Tambah Jadwal Mahasiswa</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           @csrf

          {{-- Nama Mahasiswa --}}
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Mahasiswa:</label>
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
              <option value="">Pilih Mahasiswa</option>
              @foreach ($students as $item)
              <option value="{{ $item->id }}">{{ $item->username }} - {{ $item->name }}</option>
              @endforeach
          </select>
            @error ('user_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          {{-- Nama Mahasiswa End --}}
            
             {{-- Matakuliah --}}
             <div class="form-group">
              <label for="exampleInputPassword1">Pilih Matakuliah:</label>
              <select class="form-control @error('matakuliah_id') is-invalid @enderror" id="matakuliah_id" name="matakuliah_id">
                <option value="">Pilih Matakuliah:</option>
                @foreach ($matakuliah as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_matakuliah }} - {{ $item->name }} - {{ $item->namadosen->name }}  - {{ $item->kelas->name }}</option>
                @endforeach
            </select>
              @error ('matakuliah_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
             {{-- Matakuliah End --}}

            
             <!-- /.card-body -->
            </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
           <button type="submit" class="btn btn-success">Buat</button>
         </form>
         </div>
       </div>
     </div>
   </div>