<?php

namespace App\Http\Controllers;

use App\Models\Co_Act;
use App\Models\TipeIndustri;
use Illuminate\Http\Request;

class PrototypeWPController extends Controller
{
    public function leadsheet()
    {
        $kodes = TipeIndustri::with(
            'bisCycs.co_objs.co_acts.risks',
            )->get();
        
            $controls = TipeIndustri::with(
            'bisCycs.co_objs.re_accounts',
            'bisCycs.co_objs.co_acts.risks',
            )->where('kodeIndustri', 'ITGC')->get();
        
        $leadsheet = [
            'kodeLeadsheet' => 'ITGC-Berau2025',
            'kodeTestCA' => 'MC0101',
            'desain' => 'tidak memadai',
            'test' => 'N',
            'issue' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique sit quos facere nihil accusamus iusto porro enim. Facere sit, fuga voluptate rerum nihil neque nam reprehenderit molestiae consequatur reiciendis! Veniam!',
        ];

        return view('leadsheet-wp', [
            'ls' => $leadsheet,
            'c' => $controls,
            'tis' => $kodes,
        ]);
        
        // dd($controls);
    }

    public function understanding(Request $request, string $kodeCA)
    {
        $kodes = TipeIndustri::with(
            'bisCycs.co_objs.co_acts.risks',
            )->get();
        $ca = Co_Act::where('kodeCA', $kodeCA)->first();
        // dd($ca->co_obj);
        $understanding = [
            0 => [
                'kodeLeadsheet' => 'ITGC-Berau2025',
                'kodeTestCA' => 'MC0101',
                'activityCA' => 'Terdapat proses inisiasi proyek dan perencanaan fungsi sistem.',
                'sop' => '',
                'dijalankan' => '',
                'penjelasanActivity' => 'Tercantum dalam dokumen nomor IT-SAP/501/BC/11-2019 tentang Prosedur Perubahan Konfigurasi SAP (Change Request) tanggal berlaku November 2019. Rev 1.

1. Pengajuan perubahan konfigurasi (change request)
Pemohon mengisi form change request untuk permintaan konfigurasi atau pembuatan program melalui Solution Manager.',
            ],
            1 => [
                'kodeLeadsheet' => 'ITGC-Berau2025',
                'kodeTestCA' => 'MC0101',
                'activityCA' => 'Terdapat proses pendefinisian kebutuhan pengguna.',
                'sop' => '',
                'dijalankan' => '',
                'penjelasanActivity' => 'Pendefinisian kebutuhan pengguna dicantumkan kedalam form changer request.', 
            ],
        ];
        // dd($request, $kodeCA, $understanding);
        return view('understanding-wp', [
            'ls' => $understanding,
            'tis' => $kodes,
        ]);
    }
}
