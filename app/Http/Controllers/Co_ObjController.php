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

        $bc = BuisnessCycle::where('kodeBisCyc', $id)->get();
        $request->merge(['kodeBisCyc' => $id]);
        // dd($request, $bc);
        $request->validate([
            'kodeBisCyc' => 'required|string|max:20',
            'kodeco' => 'required|string|max:20',
            'controlobj' => 'required|string',
            'description' => 'required|string',
        ]);

        Co_Obj::create([
            'kodeBisCyc' => $request->kodeBisCyc,
            'kodeCO' => $request->kodeco,
            'control_obj' => $request->controlobj,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Control Objective pada Cycle '. $bc[0]->namaBisCyc .' berhasil ditambahkan!');
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
