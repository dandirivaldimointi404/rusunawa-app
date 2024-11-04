<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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
        // $kamar = Kamar::all();
        $kamar = Kamar::withCount('penghuni')->get();
        return view('penghuni.create', compact('kamar'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => '',
            'username' => 'required|string|unique:users,username|max:255',
            'password' => '',
            'nama_penghuni' => '',
            'alamat' => '',
            // 'no_wa_pribadi' => '',
            'no_wa_ortu' => '',
            'tgl_masuk' => '',
            'kamar_id' => '',
        ], [
            'username.unique' => 'NIM sudah digunakan.',
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
            // 'no_wa_pribadi' => $validatedData['no_wa_pribadi'],
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
        $penghuni = Penghuni::with('kamar', 'user')->findOrFail($id);
        $kamar = Kamar::all();
        return view('penghuni.edit', compact('penghuni', 'kamar'));
    }




    /**
     * Update the specified resource in storage.
     */



    public function update(Request $request, $id)
    {
        $penghuni = Penghuni::with('user')->findOrFail($id);
        // $user = User::all();

        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'username' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('users')->ignore($penghuni->user->id),
            ],
            'password' => 'nullable|string|min:6',

            'alamat' => '',
            'no_wa_ortu' => '',
            'tgl_masuk' => '',
            'kamar_id' => '',
        ]);

        if (isset($validatedData['name']) || isset($validatedData['username']) || isset($validatedData['password'])) {
            $user = $penghuni->user;

            if (isset($validatedData['name']) && $user->name !== $validatedData['name']) {
                $user->name = $validatedData['name'];
            }

            if (isset($validatedData['username']) && $user->username !== $validatedData['username']) {
                $user->username = $validatedData['username'];
            }

            if (isset($validatedData['password']) && !empty($validatedData['password'])) {
                $user->password = Hash::make($validatedData['password']);
            }

            $user->save();
        }


        // $penghuni->fill($validatedData);
        $penghuni->fill(array_filter([
            'nama_penghuni' => $validatedData['nama_penghuni'] ?? $penghuni->nama_penghuni,
            'alamat' => $validatedData['alamat'] ?? $penghuni->alamat,
            'no_wa_ortu' => $validatedData['no_wa_ortu'] ?? $penghuni->no_wa_ortu,
            'tgl_masuk' => $validatedData['tgl_masuk'] ?? $penghuni->tgl_masuk,
            'kamar_id' => $validatedData['kamar_id'] ?? $penghuni->kamar_id,
        ]));

        $penghuni->save();

        return redirect()->route('penghuni.index')->with('success', 'Data penghuni telah diperbarui.');
    }









    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
