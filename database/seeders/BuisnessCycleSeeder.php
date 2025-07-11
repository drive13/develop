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
            'kodeIndustri' => 'GCMan',
            'kodeBisCyc' => 'EX10',
            'namaBisCyc' => 'Expenditure',
        ]);
        
        BuisnessCycle::create([
            'kodeIndustri' => 'GCMan',
            'kodeBisCyc' => 'PM10',
            'namaBisCyc' => 'Premium',
        ]);
        

    }
}
