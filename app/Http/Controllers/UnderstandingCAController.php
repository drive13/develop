<?php

namespace App\Http\Controllers;

use App\Models\Co_Act;
use App\Models\Co_Obj;
use App\Models\TipeIndustri;
use App\Models\UnderstandingCA;
use Illuminate\Http\Request;
use League\Uri\Encoder;

class UnderstandingCAController extends Controller
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
     * ------------------------------------------
     * Untuk simpan activity yang di review
     * kode activity harus di generate
     * 
     */
    public function store(Request $request)
    {
        $count = UnderstandingCA::where('kodeActivityCA', 'like', $request->klspca.'%')->count();
        $generatedCode = $request->klspca . '/' . $count+1;
        // dd($generatedCode, $request->klspca, $count);

        $kodeCA = explode('/', $request->klspca);
        // dd($kodeCA, $request);
        $request->merge([
            'kodeActivityCA' => $generatedCode,
            'kodeCA' => $kodeCA[1],
            'kodeLeadsheet' => $kodeCA[0],
        ]);
        
        $request->validate([
            'kodeActivityCA' => 'required',
            'kodeCA' => 'required',
            'kodeLeadsheet' => 'required',
            'activityCA' => 'required',
        ]);

        UnderstandingCA::create([
            'kodeActivityCA' => $request->kodeActivityCA,
            'kodeCA' => $request->kodeCA,
            'kodeLeadsheet' => $request->kodeLeadsheet,
            'activityCA' => $request->activityCA,
        ]);

        return redirect()->back()->with('success', 'Activity telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnderstandingCA $understandingCA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnderstandingCA $understandingCA, string $param)
    {
        /**
         * flow yang mau dibuat
         * 1. dapet param dari leadsheet, query per ca, tapi test nya masih kosong
         * 2. di halaman buat tombol form untuk tambah test yang di inginkan, kirim ke method store() trus back()
         * 3. tiap baris test adalah form yang dapat di update di method update()
         * 4. OK
        */
        $hasil = explode("&&", $param);
        $ca = Co_Act::with(
            'co_obj.bisCyc.tipeIndustri',
            'risks',
        )->where('kodeCA', $hasil[2])->first();
        $kodes = TipeIndustri::with(
            'bisCycs.co_objs.co_acts.risks',
            )->where('kodeIndustri', 'ITGC')->get(); // nanti harusnya query per klient + penugasan + wp itgc

        // $activityCA = UnderstandingCA::where('kodeLeadsheet', $hasil[0], 'and', 'kodeCA', $hasil[2])->get();
        $activityCA = UnderstandingCA::where('kodeLeadsheet', $hasil[0])
            ->where('kodeCA', $hasil[2])
            ->get();

        return view('understanding-wp', [
            'tis' => $kodes,
            'ca' => $ca,
            'klspca' => $hasil[0].'/'.$hasil[2], //kode leadsheet per ca
            'aCA' => $activityCA,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnderstandingCA $understandingCA)
    {
        $fileAttachments = [];
        $request->validate([
            'kodeActivityCA' => 'required|string',
            'activityCA' => 'required|string',
            'dijalankan' => 'required|boolean',
            'sop' => 'required|boolean',
            'penjelasanActivity' => 'required|string',
            'attachments.*' => 'file|mimes:jpg,gif,jpeg,png,pdf,doc,docx,xlx,xlsx|max:30720', // max 2MB
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName(); //nanti sesuaikan dengan kode klien
                $file->storeAs('uploads', $filename, 'public');
                $fileAttachments[] = $filename;
            }
        } else {
            $u = UnderstandingCA::where('kodeActivityCA', $request->kodeActivityCA)->first();
            $fileAttachments = $u->attachments ?? [];
        }

        UnderstandingCA::where('kodeActivityCA', $request->kodeActivityCA)->update([
            'kodeActivityCA' => $request->kodeActivityCA,
            'activityCA' => $request->activityCA,
            'dijalankan' => $request->dijalankan,
            'sop' => $request->sop,
            'penjelasanActivity' => $request->penjelasanActivity,
            'attachments' => $fileAttachments,
        ]);

        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnderstandingCA $understandingCA)
    {
        //
    }
}
