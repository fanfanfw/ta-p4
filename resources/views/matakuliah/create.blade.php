<div class="modal fade" id="modalTambahmatakuliahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <form action="{{ url('matakuliah') }}" method="POST">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header bg-success text-white">
           <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Matakuliah</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           @csrf
          {{-- Kode Matakuliah --}}
          <div class="form-group"> 
            <label for="nidn">Kode Matakuliah:</label>
            <input type="text" class="form-control @error('kode_matakuliah') is-invalid @enderror" id="kode_matakuliah" name="kode_matakuliah" value="{{ old('kode_matakuliah') }}"  placeholder="Masukan Kode Matakuliah">
            @error ('kode_matakuliah')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          {{-- Kode Matakuliah End --}}

          {{-- Nama Matakuliah --}}
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Matakuliah:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"  placeholder="Nama Matakuliah">
            @error ('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          {{-- Nama Mtakuliah End --}}

           {{-- nama Dosen --}}
             <div class="form-group">
               <label for="nama">Nama Dosen:</label>
               <select class="form-control @error('nama_dosen_id') is-invalid @enderror" id="dosen_id" name="dosen_id">
                    <option value="">Pilih Nama Dosen</option>
                    @foreach ($namadosen as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
               @error ('nama_dosen_id')
               <div class="invalid-feedback">
                 {{ $message }}
               </div>
               @enderror
             </div>
             {{-- Nama Dosen End --}}

             {{-- Program Studi --}}
             <div class="form-group">
              <label for="nama">Program Studi:</label>
              <select class="form-control @error('program_studi_id') is-invalid @enderror" id="program_studi_id" name="program_studi_id">
                   <option value="">Pilih Program Studi</option>
                   @foreach ($program as $item)
                       <option value="{{ $item->id }}">{{ $item->name }}</option>
                   @endforeach
               </select>
              @error ('nama_dosen_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            {{-- Program Studi End --}}
            
             {{-- SKS --}}
             <div class="form-group">
               <label for="status">SKS :</label>
               <input type="number" class="form-control @error('sks') is-invalid @enderror" id="sks" name="sks" value="{{ old('sks') }}"  placeholder="Jumlah SKS">
               @error ('sks')
               <div class="invalid-feedback">
                 {{ $message }}
               </div>
               @enderror
             </div>
             {{-- SKS End --}}

             {{-- Semester --}}
             <div class="form-group">
              <label for="status">Semester :</label>
              <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester') }}"  placeholder="Semester Ke">
              @error ('semester')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            {{-- Semester End --}}

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