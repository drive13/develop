<?php

namespace Database\Seeders;

use App\Models\RelatedAccount;
use Illuminate\Database\Seeder;

class RelatedAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RelatedAccount::create([
            'kodeCO' => 'EX1015',
            'nama_akun' => 'Property',
            'asersi' => 'Validity',
        ]);
        
        RelatedAccount::create([
            'kodeCO' => 'EX1015',
            'nama_akun' => 'Operating Expense',
            'asersi' => 'Validity',
        ]);
        
        RelatedAccount::create([
            'kodeCO' => 'EX1015',
            'nama_akun' => 'Payables',
            'asersi' => 'Validity',
        ]);
        
        RelatedAccount::create([
            'kodeCO' => 'EX1025',
            'nama_akun' => 'Porperty',
            'asersi' => 'Recording',
        ]);
        
        RelatedAccount::create([
            'kodeCO' => 'EX1025',
            'nama_akun' => 'Payables',
            'asersi' => 'Recording',
        ]);
        
        RelatedAccount::create([
            'kodeCO' => 'PM1010',
            'nama_akun' => 'Premium',
            'asersi' => 'Completeness',
        ]);
        
        RelatedAccount::create([
            'kodeCO' => 'PM005',
            'nama_akun' => 'Premium',
            'asersi' => 'validity',
        ]);

    }
}
