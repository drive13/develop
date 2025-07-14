<?php

namespace App\Http\Controllers;

use App\Models\BuisnessCycle;
use App\Models\Co_Act;
use App\Models\Co_Obj;
use Illuminate\Http\Request;

class Co_actController extends Controller
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
        $request->merge(['kodeCO' => $id]);
        // dd($request->all());
        $request->validate([
            'kodeCO' => 'required|string',
            'kodeCA' => 'required|string|max:20',
            'control_act' => 'required|string',
            'description' => 'required|string',
            'test_of_control' => 'required|string',
            'nature' => 'required|string|max:30',
        ]);

        Co_Act::create([
            'kodeCO' => $request->kodeCO,
            'kodeCA' => $request->kodeCA,
            'control_act' => $request->control_act,
            'description' => $request->description,
            'test_of_control' => $request->test_of_control,
            'nature' => $request->nature,
        ]);
        return redirect()->back()->with('success', 'Control Activity berhasil ditambahkan!');
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
