<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('kelas.index', [
            'kelas' => Kelas::latest()->get(),
            'active' => 'kelas',
            'title' => 'Kelas'
        ]);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:3'
        ],[
            'name.required' => 'Nama Kelas Wajib Diisi!'
        ]);

        $data = [
            'name' => $request->name
        ];

        Kelas::create($data);
        return redirect()->to('kelas')->with('success', 'Berhasil Menambahakan Data Kelas');
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|min:3'
        ],[
            'name.required' => 'Nama Kelas Wajib Diisi!'
        ]);

        $data = [
            'name' => $request->name
        ];

        Kelas::find($id)->update($data);
        return redirect()->to('kelas')->with('success', 'Berhasil Mengubah Data Kelas');
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
            Kelas::where('id', $id)->delete();
        return redirect()->to('kelas')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Jika terjadi pelanggaran integritas konstrain foreign key,
                // maka tampilkan pesan error yang sesuai
                return redirect()->to('kelas')->with('error', 'Tidak dapat menghapus data karena masih terdapat ketergantungan dengan data lain.');
            } else {
                // Jika terjadi kesalahan lain, tampilkan pesan error umum
                return redirect()->to('kelas')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
