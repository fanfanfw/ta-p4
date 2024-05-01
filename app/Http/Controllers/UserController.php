<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Database\QueryException;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'user' => User::latest()->get(),
            'active' => 'user',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'unique:users', 'numeric', 'regex:/^[0-9]+$/'],
            'password' => ['required', 'min:5', 'max:255'],
            'role'=>'required'
        ],[
            'name.required' => 'Nama Wajib Diisi!',
            'username.required' => 'NIM/NIDN Wajib Diisi',
            'username.regex' => 'NIM / NIDN Harus Berupa Angka',
            'username.unique' => 'NIM / NIDN sudah ada dalam database',
            'password.required' => 'Password Wajib Diisi',
        ]);
        $validateData['username'] = $request->username;
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ];

        User::create($data);


        return redirect()->to('user')->with('success', 'Berhasil Menambahakan Data User');
    }

    public function update(Request $request, string $id)
{
    //
    $validateData = $request->validate([
        'name' => 'required|max:255',
        'username' => ['required', 'min:3', 'numeric', 'regex:/^[0-9]+$/'],
        'password' => ['required', 'min:5', 'max:255'],
        'role' => 'required'
    ], [
        'name.required' => 'Nama Wajib Diisi!',
        'username.required' => 'NIM/NIDN Wajib Diisi',
        'username.numeric' => 'NIM/NIDN Wajib Angka',
        'password.required' => 'Password Wajib Diisi',
        'username.regex' => 'NIM/NIDN Tidak Valid'
    ]);
    
    // Exclude unique validation for 'username' based on the current ID
    $validateData['username'] = $request->username; // Update the username in the validated data
    $data = [
        'name' => $request->name,
        'username' => $request->username,
        'password' => $request->password,
        'role' => $request->role
    ];
    $validateData['password'] = Hash::make($validateData['password']);
    
    User::find($id)->update($data);
    return redirect()->to('user')->with('success', 'Berhasil melakukan update data');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            // Lakukan proses penghapusan di sini
            // Contoh: User::destroy($id);
            User::where('id', $id)->delete();
            return redirect()->to('user')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Jika terjadi pelanggaran integritas konstrain foreign key,
                // maka tampilkan pesan error yang sesuai
                return redirect()->to('user')->with('error', 'Tidak dapat menghapus data karena masih terdapat ketergantungan dengan data lain.');
            } else {
                // Jika terjadi kesalahan lain, tampilkan pesan error umum
                return redirect()->to('user')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
