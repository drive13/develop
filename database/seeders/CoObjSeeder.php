<?php

namespace Database\Seeders;

use App\Models\Co_Obj;
use Illuminate\Database\Seeder;

class CoObjSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Co_Obj::create([
            'bis_cyc_id' => 1,
            'codeCO' => 'FINEXP01',
            'control_obj' => 'Amounts posted to payables represent goods or services received.',
            'asersi1' => 'Validity',
            'asersi2' => Null,
            'asersi3' => Null,
            'asersi4' => Null,
        ]);
        
        Co_Obj::create([
            'bis_cyc_id' => 1,
            'codeCO' => 'FINEXP02',
            'control_obj' => 'Payable amounts are accurately calculated and recorded.',
            'asersi1' => 'Recording',
            'asersi2' => Null,
            'asersi3' => Null,
            'asersi4' => Null,
        ]);
        
        Co_Obj::create([
            'bis_cyc_id' => 1,
            'codeCO' => 'FINEXP02',
            'control_obj' => 'Payable amounts are accurately calculated and recorded.',
            'asersi1' => 'Recording',
            'asersi2' => Null,
            'asersi3' => Null,
            'asersi4' => Null,
        ]);
        
        Co_Obj::create([
            'bis_cyc_id' => 2,
            'codeCO' => 'FINBOR01',
            'control_obj' => 'Recorded debt represents a valid liability of the organization.',
            'asersi1' => 'Validity',
            'asersi2' => Null,
            'asersi3' => Null,
            'asersi4' => Null,
        ]);
        
        Co_Obj::create([
            'bis_cyc_id' => 2,
            'codeCO' => 'FINBOR02',
            'control_obj' => 'Borrowings are recorded accurately as to amounts and terms.',
            'asersi1' => 'Recording',
            'asersi2' => Null,
            'asersi3' => Null,
            'asersi4' => Null,
        ]);
        
        Co_Obj::create([
            'bis_cyc_id' => 3,
            'codeCO' => 'FINFA01',
            'control_obj' => 'Recorded fixed asset acquisitions represent fixed assets acquired by the organization.',
            'asersi1' => 'Validity',
            'asersi2' => Null,
            'asersi3' => Null,
            'asersi4' => Null,
        ]);
        
        Co_Obj::create([
            'bis_cyc_id' => 4,
            'codeCO' => 'FINTRES01',
            'control_obj' => 'Recorded investments represent assets of the organization.',
            'asersi1' => 'Validity',
            'asersi2' => Null,
            'asersi3' => Null,
            'asersi4' => Null,
        ]);
        
        Co_Obj::create([
            'bis_cyc_id' => 5,
            'codeCO' => 'INSEXP01',
            'control_obj' => 'Amounts posted to payables represent goods or services received.',
            'asersi1' => 'Validity',
            'asersi2' => Null,
            'asersi3' => Null,
            'asersi4' => Null,
        ]);
        
        Co_Obj::create([
            'bis_cyc_id' => 6,
            'codeCO' => 'INSPRE01',
            'control_obj' => 'Only enter into policies lines of business which have an acceptable level of risk',
            'asersi1' => 'Validity',
            'asersi2' => Null,
            'asersi3' => Null,
            'asersi4' => Null,
        ]);
    }
}
