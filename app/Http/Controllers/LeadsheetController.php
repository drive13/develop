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

        return view('leadsheet-wp', [
            'c' => $controls,
            'tis' => $kodes,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leadsheet $leadsheet)
    {
        //
    }
}
