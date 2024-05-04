<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\UserMatakuliah;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class InputMatakuliahDosenController extends Controller
{
    //
    

    public function index()
    {
            $usermatakuliah = UserMatakuliah::all();
            $user = User::all();
            $kelas = Kelas::all();
            $matakuliah = Matakuliah::all();
            $lectures = User::where('role', 'dosen')->get();
            // $userjadwal = $userjadwal2->unique('hari_id'); // Menghindari duplikasi data berdasarkan user_id

            return view('input-matakuliah-dosen.index', [
                'usermatakuliah' => $usermatakuliah,
                'user' => $user,
                'kelas' => $kelas,
                'lectures' => $lectures,
                'active' => 'input-matakulih',
                'matakuliah' => $matakuliah,
                'title' => 'Input Matakuliah'
            ]);
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'matakuliah_id' => 'required',
        ],[
            'matakuliah_id.required' => 'Matakuliah Wajib Dipilih!',
            'user_id.required' => 'Mohon Pilih Mahasiswa!',
        ]);

        $matakuliah = Matakuliah::with('jadwalKuliahs.hari')->find($request->matakuliah_id);
        if (!$matakuliah || !$matakuliah->jadwalKuliahs->first() || !$matakuliah->jadwalKuliahs->first()->hari) {
            return redirect()->back()->with('error', 'Jadwal Belum Tersedia Untuk Matakuliah Yang Dipiih!!!! SIlahkan Buat Jadwal Terlebih Dahulu');
        }

        $data = [
            'matakuliah_id' => $request->matakuliah_id,
            'user_id' => $request->user_id,
        ];

        UserMatakuliah::create($data);
        return redirect()->to('input-matakuliah-dosen')->with('success', 'Berhasil Menambahakan Data Matakuliah Mahasiswa');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'matakuliah_id' => 'required',
        ],[
            'matakuliah_id.required' => 'Matakuliah Wajib Dipilih!',
            'user_id.required' => 'Mohon Pilih Mahasiswa!',
        ]);

        
        $data = [
            'matakuliah_id' => $request->matakuliah_id,
            'user_id' => $request->user_id,
        ];
        $matakuliah = Matakuliah::with('jadwalKuliahs.hari')->find($request->matakuliah_id);
        if (!$matakuliah || !$matakuliah->jadwalKuliahs->first() || !$matakuliah->jadwalKuliahs->first()->hari) {
            return redirect()->back()->with('error', 'Jadwal Belum Tersedia Untuk Matakuliah Yang Dipiih!!!! SIlahkan Buat Jadwal Terlebih Dahulu');
        }
        
        UserMatakuliah::find($id)->update($data);
        return redirect()->to('input-matakuliah-dosen')->with('success', 'Berhasil Menambahakan Data Matakuliah Mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            // Lakukan proses penghapusan di sini
            // Contoh: User::destroy($id);
            UserMatakuliah::where('id', $id)->delete();
        return redirect()->to('input-matakuliah-dosen')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Jika terjadi pelanggaran integritas konstrain foreign key,
                // maka tampilkan pesan error yang sesuai
                return redirect()->to('input-matakuliah-dosen')->with('error
                ', 'Tidak dapat menghapus data karena masih terdapat ketergantungan dengan data lain.');
            } else {
                // Jika terjadi kesalahan lain, tampilkan pesan error umum
                return redirect()->to('input-matakuliah-dosen')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
