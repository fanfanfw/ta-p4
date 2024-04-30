<div class="modal fade" id="modalTambahruanganData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <form action="{{ url('ruangan') }}" method="POST">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header bg-success text-white">
           <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Ruangan</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           @csrf
           {{-- nama ruangan --}}
             <div class="form-group">
               <label for="nama">Nama Ruangan:</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{ old('name') }}" placeholder="Masukan Nama">
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
              <input type="number" class="form-control" id="inputnama" name="kapasitas" value="{{ old('kapasitas') }}" placeholder="Masukan Jumlah Kapasitas Ruangan" autofocus>
                @error ('kapasitas')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
                {{-- kapasitas end --}}
                
               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Buat</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>