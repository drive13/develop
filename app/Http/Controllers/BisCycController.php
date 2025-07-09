<?php

namespace App\Http\Controllers;

use App\Models\BuisnessCycle;
use App\Models\TipeIndustri;
use Illuminate\Http\Request;

class BisCycController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // $bc = BuisnessCycle::with(
        //     'tipeIndustri',
        //     'co_objs.co_acts.risks'
        //     )
        //     ->where('id', $id)->get();
        $bc = TipeIndustri::with(
            'bisCycs.co_objs.co_acts.risks'
            )
            ->where('id', $id)->get();
        
        // dd($bc);
        
        return view('biscyc', [
            'bc' => $bc,
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
        // dd($request);
        $request->validate([
            'tipe_industri_id' => 'required|string',
            'namaBisCyc' => 'required|string|max:20',
            'codeBisCyc' => 'required|string|max:10',
        ]);
        
        BuisnessCycle::create([
            'tipe_industri_id' => $request->tipe_industri_id,
            'namaBisCyc' => $request->namaBisCyc,
            'codeBisCyc' => $request->codeBisCyc,
        ]);

        return redirect()->back()->with('success', 'Buissness Cycle Telah Ditambahkan!');

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
