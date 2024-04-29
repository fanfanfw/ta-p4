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
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
