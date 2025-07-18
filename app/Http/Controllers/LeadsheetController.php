<?php

namespace App\Http\Controllers;

use App\Models\Leadsheet;
use App\Models\TipeIndustri;
use Illuminate\Http\Request;

class LeadsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $kodes = TipeIndustri::with(
            'bisCycs.co_objs.co_acts.risks',
        )->get();
        
        $controls = TipeIndustri::with(
            'bisCycs.co_objs.re_accounts',
            'bisCycs.co_objs.co_acts.risks',
        )->where('kodeIndustri', 'ITGC')->get();
        
        $ls = Leadsheet::where('kodeLeadsheet', 'BCE25-U001')->orderBy('kodeCO', 'asc')->get();
        // dd($ls);
        return view('leadsheet-wp', [
            'controls' => $controls,
            'tis' => $kodes,
            'ls' => $ls,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Leadsheet $leadsheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leadsheet $leadsheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leadsheet $leadsheet)
    {
        return 'belum jadi :v';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leadsheet $leadsheet)
    {
        //
    }
}
