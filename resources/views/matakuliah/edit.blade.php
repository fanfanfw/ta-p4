@foreach ($matakuliah as $item)
<div class="modal fade" id="modalEditmatakuliahData{{ $item->id }}">
  <form action="{{ url('matakuliah/'.$item->id) }}" method="POST">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header bg-warning">
         <h5 class="modal-title" id="modalEditDataLabel">Mengubah Data Matakuliah</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        @method('PUT')
         @csrf
        {{-- Kode Matakuliah --}}
        <div class="form-group"> 
          <label for="nidn">Kode Matakuliah:</label>
          <input type="text" class="form-control @error('kode_matakuliah') is-invalid @enderror" id="kode_matakuliah" name="kode_matakuliah" value="{{ $item->kode_matakuliah }}"  placeholder="Masukan Kode Matakuliah">
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
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $item->name }}"  placeholder="Nama Matakuliah">
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
            <select class="form-control @error('nama_dosen_id') is-invalid @enderror" id="nama_dosen_id" name="nama_dosen_id" >
                 <option value="">Pilih Nama Dosen</option>
                 @foreach ($namadosen as $dosen)
                     <option value="{{ $dosen->id }}" {{ $dosen->id == $item->nama_dosen_id ? 'selected' : '' }}>{{ $dosen->name }}</option>
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
                @foreach ($program as $prodi)
                    <option value="{{ $prodi->id }}" {{ $prodi->id == $item->program_studi_id ? 'selected' : '' }}>{{ $prodi->name }}</option>
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
            <input type="number" class="form-control @error('sks') is-invalid @enderror" id="sks" name="sks" value="{{ $item->sks }}"  placeholder="Jumlah SKS">
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
           <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ $item->semester }}"  placeholder="Semester Ke">
           @error ('semester')
           <div class="invalid-feedback">
             {{ $message }}
           </div>
           @enderror
         </div>
         {{-- Semester End --}}

         {{-- kelas --}}
         <div class="form-group">
          <label for="exampleInputPassword1">Kelas:</label>
          <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id">
            <option value="">Pilih Maakuliah</option>
            @foreach ($kelas as $kelass)
                <option value="{{ $kelass->id }}" {{ $kelass->id == $item->kelas_id ? 'selected' : '' }}>{{ $kelass->name }}</option>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endforeach