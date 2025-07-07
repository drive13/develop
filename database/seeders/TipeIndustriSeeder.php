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
            'nama' => 'Finance',
        ]);
        
        TipeIndustri::create([
            'nama' => 'Insurance',
        ]);
    }
}
