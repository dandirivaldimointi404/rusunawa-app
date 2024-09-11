<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penghuni = Penghuni::with('user', 'kamar')->get();
        return view('penghuni.index', compact('penghuni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kamar = Kamar::all();
        return view('penghuni.create', compact('kamar'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => '',
            'username' => '',
            'password' => '',
            'nama_penghuni' => '',
            'alamat' => '',
            'no_wa_pribadi' => '',
            'no_wa_ortu' => '',
            'tgl_masuk' => '',
            'kamar_id' => '',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'level' => 'penghuni',
        ]);

        Penghuni::create([
            'user_id' => $user->id,
            'kamar_id' => $validatedData['kamar_id'],
            'nama_penghuni' => $validatedData['name'],
            'alamat' => $validatedData['alamat'],
            'no_wa_pribadi' => $validatedData['no_wa_pribadi'],
            'no_wa_ortu' => $validatedData['no_wa_ortu'],
            'tgl_masuk' => $validatedData['tgl_masuk'],
        ]);

        return redirect()->route('penghuni.index')->with('success', 'Data penghuni telah ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
