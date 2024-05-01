<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NamaDosen;
use Illuminate\Database\QueryException;

class DatadosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('data-dosen.index', [
            'namadosen' => NamaDosen::latest()->get(),
            'active' => 'data-dosen',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:5'
        ],[
            'name.required' => 'Nama Dosen Studi Wajib Diisi!'
        ]);

        $data = [
            'name' => $request->name
        ];

        NamaDosen::create($data);
        return redirect()->to('data-dosen')->with('success', 'Berhasil Menambahakan Data Nama Dosen');
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
            'name.required' => 'Program Studi Wajib Diisis!'
        ]);

        $data = [
            'name' => $request->name
        ];

        NamaDosen::find($id)->update($data);
        return redirect()->to('data-dosen')->with('success', 'Berhasil melakukan update data');
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
            NamaDosen::where('id', $id)->delete();
        return redirect()->to('data-dosen')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Jika terjadi pelanggaran integritas konstrain foreign key,
                // maka tampilkan pesan error yang sesuai
                return redirect()->to('data-dosen')->with('error', 'Tidak dapat menghapus data karena masih terdapat ketergantungan dengan data lain.');
            } else {
                // Jika terjadi kesalahan lain, tampilkan pesan error umum
                return redirect()->to('data-dosen')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
