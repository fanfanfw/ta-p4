<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('jam.index', [
            'jam' => Jam::latest()->get(),
            'active' => 'jam',
            'title' => 'Jam Kelas'
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
            'name.required' => 'Jam Kelas Wajib Diisi!'
        ]);

        $data = [
            'name' => $request->name
        ];

        Jam::create($data);
        return redirect()->to('jam')->with('success', 'Berhasil Menambahakan Data Jam Kelas');
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
            'name.required' => 'Jam Kelas Wajib Diisi!'
        ]);

        $data = [
            'name' => $request->name
        ];

        Jam::find($id)->update($data);
        return redirect()->to('jam')->with('success', 'Berhasil Mengubah Data Jam Kelas');
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
            Jam::where('id', $id)->delete();
        return redirect()->to('jam')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Jika terjadi pelanggaran integritas konstrain foreign key,
                // maka tampilkan pesan error yang sesuai
                return redirect()->to('jam')->with('error', 'Tidak dapat menghapus data karena masih terdapat ketergantungan dengan data lain.');
            } else {
                // Jika terjadi kesalahan lain, tampilkan pesan error umum
                return redirect()->to('jam')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
