<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('program.index', [
            'program' => ProgramStudi::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3'
        ],[
            'name.required' => 'Program Studi Wajib Diisi!'
        ]);

        $data = [
            'name' => $request->name
        ];

        ProgramStudi::create($data);
        return redirect()->to('program')->with('success', 'Berhasil Menambahakan Data Program Studi');
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

        ProgramStudi::find($id)->update($data);
        return redirect()->to('program')->with('success', 'Berhasil melakukan update data');
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
            ProgramStudi::where('id', $id)->delete();
        return redirect()->to('program')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Jika terjadi pelanggaran integritas konstrain foreign key,
                // maka tampilkan pesan error yang sesuai
                return redirect()->to('program')->with('error', 'Tidak dapat menghapus data karena masih terdapat ketergantungan dengan data lain.');
            } else {
                // Jika terjadi kesalahan lain, tampilkan pesan error umum
                return redirect()->to('program')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
