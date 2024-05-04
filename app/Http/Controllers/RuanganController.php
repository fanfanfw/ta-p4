<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('ruangan.index', [
            'ruangan' => Ruangan::latest()->get(),
            'active' => 'ruangan',
            'title' => 'Ruangan'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'kapasitas' => 'required'
        ],[
            'name.required' => 'Nama Ruangan Wajib Diisi!',
            'kapasitas.required' => 'Kapasitas Ruangan Wajib Diisi!'
        ]);

        $data = [
            'name' => $request->name,
            'kapasitas' => $request->kapasitas
        ];

        Ruangan::create($data);
        return redirect()->to('ruangan')->with('success', 'Berhasil Menambahakan Data Ruangan');
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
            'name.required' => 'Nama Ruangan Wajib Diisi!'
        ]);

        $data = [
            'name' => $request->name
        ];

        Ruangan::find($id)->update($data);
        return redirect()->to('ruangan')->with('success', 'Berhasil Mengubah Data Ruangan');
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
            Ruangan::where('id', $id)->delete();
        return redirect()->to('ruangan')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Jika terjadi pelanggaran integritas konstrain foreign key,
                // maka tampilkan pesan error yang sesuai
                return redirect()->to('ruangan')->with('error', 'Tidak dapat menghapus data karena masih terdapat ketergantungan dengan data lain.');
            } else {
                // Jika terjadi kesalahan lain, tampilkan pesan error umum
                return redirect()->to('ruangan')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
