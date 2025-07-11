<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'kodeIndustri' => 'GCMan',
            'code_client' => 'BRC001',
            'nama' => 'PT Berau Coal Energy Tbk',
            'alamat' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil, reiciendis.',
            'initial_year' => '2024',
            'current_year' => '2024',
        ]);
        
        Client::create([
            'kodeIndustri' => 'GCMan',
            'code_client' => 'GEMS001',
            'nama' => 'PT Golden Energy Mines Tbk',
            'alamat' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil, reiciendis.',
            'initial_year' => '2024',
            'current_year' => '2024',
        ]);
    }
}
