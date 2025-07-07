<?php

namespace Database\Seeders;

use App\Models\Risk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Risk::create([
            'co_act_id' => 1,
            'risk' => 'risk dari ca expense EX104',
        ]);
        
        Risk::create([
            'co_act_id' => 2,
            'risk' => 'risk dari ca expense EX107',
        ]);
        
        Risk::create([
            'co_act_id' => 3,
            'risk' => 'risk dari ca expense EX151',
        ]);
        
        Risk::create([
            'co_act_id' => 4,
            'risk' => 'risk dari ca premium PM105',
        ]);
        
        Risk::create([
            'co_act_id' => 5,
            'risk' => 'risk dari ca premium PM110',
        ]);
    }
}
