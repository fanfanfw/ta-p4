<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
        //
        Session::flash('name',$request->name);

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
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
        
    // }

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
        ProgramStudi::where('id', $id)->delete();
        return redirect()->to('program')->with('success', 'Berhasil Menghapus Data');
    }
}
