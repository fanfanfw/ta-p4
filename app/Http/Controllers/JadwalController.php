<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use App\Models\JadwalKuliah;
use App\Models\Jam;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\NamaDosen;
use App\Models\ProgramStudi;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $namadosen = NamaDosen::all();
        $program = ProgramStudi::all();
        $ruangan = Ruangan::all();
        $matakuliah = Matakuliah::all();
        $hari = Hari::all();
        $kelas = Kelas::all();
        $jam = Jam::all();
        return view('jadwal.index', [
            'jadwal' => JadwalKuliah::latest()->get(),
            'namadosen' => $namadosen,
            'program' => $program,
            'ruangan' => $ruangan,
            'matakuliah' => $matakuliah,
            'hari' => $hari,
            'kelas' => $kelas,
            'jam' => $jam,
            'active' => 'jadwal',

        ]);
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'matakuliah_id' => 'required',
            'ruangan_id' => 'required',
            'hari_id' => 'required',
            'jam_id' => 'required',
            'kelas_id'=>'required',
        ],[
            'matakuliah_id.required' => 'Matakuliah Wajib Diisi!',
            'ruangan_id.required' => 'Ruangan wajib Diisi!',
            'hari_id.required' => 'Hari Wajib Dipilih!',
            'jam_id.required' => 'Jam Pelajaran Wajib Dipilih!',
            'kelas_id.required' => 'Kelas Wajib Diisi',
        ]);
        $data = [
            'matakuliah_id' => $request->matakuliah_id,
            'ruangan_id' => $request->ruangan_id,
            'hari_id' => $request->hari_id,
            'jam_id' => $request->jam_id,
            'kelas_id' => $request->kelas_id,
        ];

        JadwalKuliah::create($data);
        return redirect()->to('jadwal')->with('success', 'Berhasil Menambahakan Data Jadwal Kuliah');
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'matakuliah_id' => 'required',
            'ruangan_id' => 'required',
            'hari_id' => 'required',
            'jam_id' => 'required',
            'kelas_id'=>'required',
        ],[
            'matakuliah_id.required' => 'Matakuliah Wajib Diisi!',
            'ruangan_id.required' => 'Ruangan wajib Diisi!',
            'hari_id.required' => 'Hari Wajib Dipilih!',
            'jam_id.required' => 'Jam Pelajaran Wajib Dipilih!',
            'kelas_id.required' => 'Kelas Wajib Diisi',
        ]);
        $data = [
            'matakuliah_id' => $request->matakuliah_id,
            'ruangan_id' => $request->ruangan_id,
            'hari_id' => $request->hari_id,
            'jam_id' => $request->jam_id,
            'kelas_id' => $request->kelas_id,
        ];

        JadwalKuliah::find($id)->update($data);
        return redirect()->to('jadwal')->with('success', 'Berhasil Mengubah Jadwal Kuliah');
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
            JadwalKuliah::where('id', $id)->delete();
        return redirect()->to('jadwal')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Jika terjadi pelanggaran integritas konstrain foreign key,
                // maka tampilkan pesan error yang sesuai
                return redirect()->to('jadwal')->with('error
                ', 'Tidak dapat menghapus data karena masih terdapat ketergantungan dengan data lain.');
            } else {
                // Jika terjadi kesalahan lain, tampilkan pesan error umum
                return redirect()->to('jadwal')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
