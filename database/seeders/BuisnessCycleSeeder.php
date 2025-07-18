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
        
        BuisnessCycle::create([
            'kodeIndustri' => 'ITGC',
            'kodeBisCyc' => 'MC',
            'namaBisCyc' => 'Manage Change',
        ]);
        
        BuisnessCycle::create([
            'kodeIndustri' => 'ITGC',
            'kodeBisCyc' => 'MA',
            'namaBisCyc' => 'Manage Access',
        ]);
        
        BuisnessCycle::create([
            'kodeIndustri' => 'ITGC',
            'kodeBisCyc' => 'MO',
            'namaBisCyc' => 'Manage Operation',
        ]);
        

    }
}
