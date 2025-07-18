<?php

namespace App\Http\Controllers;

use App\Models\TipeIndustri;
use Illuminate\Http\Request;

class TipeIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tis = TipeIndustri::with('bisCycs.co_objs.co_acts')->get();
        // dd($tis);
        return view('industris', [
            'tis' => $tis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:20',
            'kodeIndustri' => 'required|string|max:20',
        ]);

        // Simpan ke database
        TipeIndustri::create([
            'nama' => $request->nama,
            'kodeIndustri' => $request->kodeIndustri,
        ]);

        // Redirect atau kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Tipe Industri berhasil ditambahkan!');
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
