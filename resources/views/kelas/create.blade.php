<div class="modal fade" id="modalTambahkelasData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <form action="{{ url('kelas') }}" method="POST">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header bg-success text-white">
           <h5 class="modal-title" id="modalTambahDataLabel">Tambah Kelas</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           @csrf
             <div class="form-group">
               <label for="nama">Nama Kelas:</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{ old('name') }}" placeholder="Masukan Nama">
               @error ('name')
               <div class="invalid-feedback">
                 {{ $message }}
               </div>
               @enderror
             </div>
            </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
           <button type="submit" class="btn btn-success">Buat</button>
         </form>
         </div>
       </div>
     </div>
   </div>