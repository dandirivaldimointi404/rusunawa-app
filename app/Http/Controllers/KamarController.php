<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $kamar = Kamar::all();
        $penghuni = Penghuni::with('kamar')->get();
        $kamar = Kamar::withCount('penghuni')->get();
        return view('kamar.index', compact('kamar','penghuni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_kamar' => '',
            'lantai' => '',
            'kapasitas' => '',
            'tarif' => '',
            'total_tarif' => '',
        ]);

        Kamar::create($validatedData);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan');
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
        $kamar = Kamar::findOrFail($id);
        return view('kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nomor_kamar' => '',
            'lantai' => '',
            'kapasitas' => '',
            'tarif' => '',
            'total_tarif' => '',
        ]);

        $kamar = Kamar::findOrFail($id);

        $kamar->update($validatedData);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus');
    }
    
}
