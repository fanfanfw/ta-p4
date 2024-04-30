<div class="modal fade" id="modalTambahdosenData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <form action="{{ url('data-dosen') }}" method="POST">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header bg-success text-white">
           <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
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