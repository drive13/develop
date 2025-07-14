<?php

namespace App\Http\Controllers;

use App\Models\RelatedAccount;
use Illuminate\Http\Request;

class RelatedAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, string $id)
    {
        // dd($request, $id);
        $request->merge(['kodeCO' => $id]);

        $request->validate ([
            'kodeCO' => 'required|string',
            'nama_akun' => 'required|string|max:30',
            'asersi' => 'required|string|max:20',
        ]);

        RelatedAccount::create([
            'kodeCO' => $request->kodeCO,
            'nama_akun' => $request->nama_akun,
            'asersi' => $request->asersi,
        ]);

        return redirect()->back()->with('success', 'Related Account telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RelatedAccount $relatedAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RelatedAccount $relatedAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RelatedAccount $relatedAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RelatedAccount $relatedAccount)
    {
        //
    }
}
