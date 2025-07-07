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
            'tipe_industri_id' => 1,
            'nama' => 'PT Berau Coal Energy Tbk',
            'code_client' => 'BRC001',
        ]);
        
        Client::create([
            'tipe_industri_id' => 2,
            'nama' => 'PT Golden Energy Mines Tbk',
            'code_client' => 'GEM002',
        ]);
    }
}
