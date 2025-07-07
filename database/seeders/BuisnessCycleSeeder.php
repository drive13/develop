<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BuisnessCycle;

class BuisnessCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    
    public function run(): void
    {
        BuisnessCycle::create([
            'tipe_industri_id' => 1,
            'codeBisCyc' => 'FinExp',
            'namaBisCyc' => 'Expense',
        ]);
        
        BuisnessCycle::create([
            'tipe_industri_id' => 1,
            'codeBisCyc' => 'FinBor',
            'namaBisCyc' => 'Borrowing',
        ]);
        
        BuisnessCycle::create([
            'tipe_industri_id' => 1,
            'codeBisCyc' => 'FinFA',
            'namaBisCyc' => 'Fixed Asset',
        ]);
        
        BuisnessCycle::create([
            'tipe_industri_id' => 1,
            'codeBisCyc' => 'FinTres',
            'namaBisCyc' => 'Fixed Asset',
        ]);
        
        BuisnessCycle::create([
            'tipe_industri_id' => 2,
            'codeBisCyc' => 'InsExp',
            'namaBisCyc' => 'Expense',
        ]);
        
        BuisnessCycle::create([
            'tipe_industri_id' => 2,
            'codeBisCyc' => 'InsPre',
            'namaBisCyc' => 'Premium',
        ]);
        
    }
}
