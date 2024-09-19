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
            // 'no_wa_pribadi' => '',
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
         // Debugging data yang diterima
         Log::info('Request Data:', $request->all());

         $validatedData = $request->validate([
             'name' => 'nullable|string',
             'username' => [
                 'nullable',
                 'string',
                 Rule::unique('users', 'username')->ignore($id),
             ],
             'password' => 'nullable|string|min:6',
             'nama_penghuni' => 'nullable|string',
             'alamat' => 'nullable|string',
             'no_wa_ortu' => 'nullable|string',
             'tgl_masuk' => 'nullable|date',
             'kamar_id' => 'nullable|integer',
         ]);

         // Update data user
         $user = User::findOrFail($id);

         // Update hanya jika nilai berubah
         if (!empty($validatedData['name']) && $validatedData['name'] !== $user->name) {
             $user->name = $validatedData['name'];
         }

         if (!empty($validatedData['username']) && $validatedData['username'] !== $user->username) {
             $user->username = $validatedData['username'];
         }

         // Jika password diisi dan berbeda, update password
         if (!empty($validatedData['password'])) {
             $user->password = Hash::make($validatedData['password']);
         }

         $user->save();

         // Update data penghuni
         $penghuni = Penghuni::where('user_id', $user->id)->firstOrFail();

         if (!empty($validatedData['kamar_id']) && $validatedData['kamar_id'] !== $penghuni->kamar_id) {
             $penghuni->kamar_id = $validatedData['kamar_id'];
         }

         if (!empty($validatedData['nama_penghuni']) && $validatedData['nama_penghuni'] !== $penghuni->nama_penghuni) {
             $penghuni->nama_penghuni = $validatedData['nama_penghuni'];
         }

         if (!empty($validatedData['alamat']) && $validatedData['alamat'] !== $penghuni->alamat) {
             $penghuni->alamat = $validatedData['alamat'];
         }

         if (!empty($validatedData['no_wa_ortu']) && $validatedData['no_wa_ortu'] !== $penghuni->no_wa_ortu) {
             $penghuni->no_wa_ortu = $validatedData['no_wa_ortu'];
         }

         if (!empty($validatedData['tgl_masuk']) && $validatedData['tgl_masuk'] !== $penghuni->tgl_masuk) {
             $penghuni->tgl_masuk = $validatedData['tgl_masuk'];
         }

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
