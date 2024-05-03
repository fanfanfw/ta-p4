<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\NamaDosen;
use App\Models\ProgramStudi;
use Illuminate\Database\QueryException;


class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $namadosen = NamaDosen::all();
        $program = ProgramStudi::all();

        return view('matakuliah.index', [
            'matakuliah' => Matakuliah::latest()->get(),
            'namadosen' => $namadosen,
            'program' => $program,
            'active' => 'matakuliah'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kode_matakuliah' => 'required|max:255',
            'name' => 'required|max:255',
            'dosen_id' => 'required',
            'program_studi_id' => 'required',
            'sks'=>'required',
            'semester' => 'required'
        ],[
            'kode_matakuliah.required' => 'Kode Matakuliah Wajib Diisi!',
            'name.required' => 'Nama Matakuliah wajib Diisi!',
            ' dosen_id.required' => 'Nama Dosen Wajib Dipilih!',
            'program_studi_id.required' => 'Program Studi Wajib Dipilih!',
            'sks.required' => 'SKS Wajib Diisi',
            'semester.required' => 'Semester Wajib Diisi',
        ]);
        $data = [
            'kode_matakuliah' => $request->kode_matakuliah,
            'name' => $request->name,
            'dosen_id' => $request->dosen_id,
            'program_studi_id' => $request->program_studi_id,
            'sks' => $request->sks,
            'semester' => $request->semester
        ];

        Matakuliah::create($data);
        return redirect()->to('matakuliah')->with('success', 'Berhasil Menambahakan Data Matakuliah');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'kode_matakuliah' => 'required|max:255',
            'name' => 'required|max:255',
            'nama_dosen_id' => 'required',
            'program_studi_id' => 'required',
            'sks'=>'required',
            'semester' => 'required'
        ],[
            'kode_matakuliah.required' => 'Kode Matakuliah Wajib Diisi!',
            'name.required' => 'Nama Matakuliah wajib Diisi!',
            'nama_dosen_id.required' => 'Nama Dosen Wajib Dipilih!',
            'program_studi_id.required' => 'Program Studi Wajib Dipilih!',
            'sks.required' => 'SKS Wajib Diisi',
            'semester.required' => 'Semester Wajib Diisi',
        ]);
        $data = [
            'kode_matakuliah' => $request->kode_matakuliah,
            'name' => $request->name,
            'nama_dosen_id' => $request->nama_dosen_id,
            'program_studi_id' => $request->program_studi_id,
            'sks' => $request->sks,
            'semester' => $request->semester
        ];

        Matakuliah::find($id)->update($data);
        return redirect()->to('matakuliah')->with('success', 'Berhasil Mengubah Data Matakuliah');
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
            Matakuliah::where('id', $id)->delete();
        return redirect()->to('matakuliah')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Jika terjadi pelanggaran integritas konstrain foreign key,
                // maka tampilkan pesan error yang sesuai
                return redirect()->to('matakuliah')->with('error', 'Tidak dapat menghapus data karena masih terdapat ketergantungan dengan data lain.');
            } else {
                // Jika terjadi kesalahan lain, tampilkan pesan error umum
                return redirect()->to('matakuliah')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
