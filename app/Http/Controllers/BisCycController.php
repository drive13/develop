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
    public function index($id) //nampilin halaman controls tiap tipe industri
    {
        // $bc = BuisnessCycle::with(
        //     'tipeIndustri',
        //     'co_objs.co_acts.risks'
        //     )
        //     ->where('id', $id)->get();
        $ti = TipeIndustri::with(
            'bisCycs.co_objs.co_acts.risks',
            'bisCycs.co_objs.re_accounts'
            )
            ->where('id', $id)->get();
        
        // dd($ti);
        
        return view('biscyc', [
            'ti' => $ti,
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
    public function store(Request $request, string $id)
    {
        // dd($request);
        $request->merge(['kodeIndustri' => $id]);
        // dd($request);
        $request->validate([
            'kodeIndustri' => 'required|string',
            'namaBisCyc' => 'required|string|max:20',
            'kodeBisCyc' => 'required|string|max:10',
        ]);
        
        BuisnessCycle::create([
            'kodeIndustri' => $request->kodeIndustri,
            'namaBisCyc' => $request->namaBisCyc,
            'kodeBisCyc' => $request->kodeBisCyc,
        ]);

        return redirect()->back()->with('success', 'Buissness Cycle '. $request->namaBisCyc .' Telah Ditambahkan!');

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
