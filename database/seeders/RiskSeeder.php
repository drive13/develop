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
            'kodeCA' => 'EX112',
            'risk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quae excepturi distinctio quia voluptate provident officiis ipsum? Voluptatum numquam qui mollitia quae exercitationem, corrupti dolores perspiciatis minus commodi non natus?',
        ]);
        
        Risk::create([
            'kodeCA' => 'EX213',
            'risk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quae excepturi distinctio quia voluptate provident officiis ipsum? Voluptatum numquam qui mollitia quae exercitationem, corrupti dolores perspiciatis minus commodi non natus?',
        ]);
    }
}

