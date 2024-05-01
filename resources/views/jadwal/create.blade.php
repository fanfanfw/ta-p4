<div class="modal fade" id="modalTambahjadwalData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <form action="{{ url('jadwal') }}" method="POST">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header bg-success text-white">
           <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Jadwal</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           @csrf

          {{-- Nama Matakuliah --}}
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Matakuliah:</label>
            <select class="form-control @error('matakuliah_id') is-invalid @enderror" id="matakuliah_id" name="matakuliah_id">
              <option value="">Pilih Matakuliah</option>
              @foreach ($matakuliah as $item)
                  <option value="{{ $item->id }}">{{ $item->kode_matakuliah }} - {{ $item->name }} - {{ $item->namadosen->name }}</option>
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
                @foreach ($ruangan as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                @foreach ($hari as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                @foreach ($jam as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
              @error ('jam_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            {{-- jam end --}}

            {{-- kelas --}}
            <div class="form-group">
              <label for="exampleInputPassword1">Kelas:</label>
              <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id">
                <option value="">Pilih Maakuliah</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
              @error ('kelas_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            {{-- kelas end --}}
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