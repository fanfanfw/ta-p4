 <div class="modal fade" id="modalTambahuserData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
   <form action="{{ url('user') }}" method="POST">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- /.card-header -->
          <!-- form start -->
          @csrf
            <div class="form-group">
              <label for="nama">Nama Dosen:</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{ old('name') }}" placeholder="Masukan Nama">
              @error ('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group"> 
              <label for="nidn">NIM / NIDN:</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('name') }}"  placeholder="Masukan NIM / NIDN">
              @error ('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password:</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  placeholder="Password">
              @error ('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="status">Role:</label>
              <select class="form-control select2" id="role" name="role">
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
            </div>
         <!-- /.card-body -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Buat</button>
        </form>
        </div>
      </div>
    </div>
  </div>