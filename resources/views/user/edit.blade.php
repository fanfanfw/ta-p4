  @foreach ($user as $item)
      
  <!-- Modal untuk mengedit data -->
  <div class="modal fade" id="modalEdituserData{{ $item->id }}" >
  <form action='{{ url('user/'.$item->id) }}' method='post'>

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" >Mengubah Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @method('PUT')
            @csrf
            <div class="form-group">
              <label for="editnama">Nama:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" placeholder="Masukan Nama">
              @error ('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="editnidn">NIDN:</label>
              <input type="text" class="form-control" id="editnidn" name="username" value="{{ $item->username }}" placeholder="Masukan NIDN">
              @error ('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password:</label>
              <input type="password" class="form-control" id="password" name="password" value="{{ $item->password }}" placeholder="Password">
              @error ('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="editrole">Role:</label>
              <select class="form-control select2" id="editrole" name="role">
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
              </select>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endforeach