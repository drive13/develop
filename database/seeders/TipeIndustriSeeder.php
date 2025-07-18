<?php

namespace Database\Seeders;

use App\Models\TipeIndustri;
use Illuminate\Database\Seeder;

class TipeIndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipeIndustri::create([
            'kodeIndustri' => 'GCMan',
            'nama' => 'Manufaktur',
        ]);
        
        TipeIndustri::create([
            'kodeIndustri' => 'ITGC',
            'nama' => 'IT General Control',
        ]);
        
    }
}
