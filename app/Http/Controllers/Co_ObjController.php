<?php

namespace App\Http\Controllers;

use App\Models\BuisnessCycle;
use App\Models\Co_Obj;
use Illuminate\Http\Request;

class Co_ObjController extends Controller
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

        $bc = BuisnessCycle::find($id);
        $request->merge(['bis_cyc_id' => $id]);
        
        $request->validate([
            'bis_cyc_id' => 'required|integer',
            'codeco' => 'required|string|max:10',
            'controlobj' => 'required|string',
            'asersi1' => 'required|string|max:20',
            'asersi2' => 'string|max:20',
            'asersi3' => 'string|max:20',
            'asersi4' => 'string|max:20',
        ]);

        Co_Obj::create([
            'bis_cyc_id' => $request->bis_cyc_id,
            'codeCO' => $request->codeco,
            'control_obj' => $request->controlobj,
            'asersi1' => $request->asersi1,
            'asersi2' => $request->asersi2,
            'asersi3' => $request->asersi3,
            'asersi4' => $request->asersi4,
        ]);

        return redirect()->back()->with('success', 'Control Objective pada Cycle '. $bc->namaBisCyc .' berhasil ditambahkan!');
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
