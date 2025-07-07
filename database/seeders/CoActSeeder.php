<?php

namespace Database\Seeders;

use App\Models\Co_Act;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoActSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Co_Act::create([
            'co_obj_id' => 1,
            'codeCA' => 'EX104(F)',
            'control_act' => 'When possible, general ledger balances are reconciled to the supporting detail (such as depreciation expenditures to the property system and salaries expenditures to payroll records) and differences are resolved in a timely manner.  Management, independent employees, or internal auditors perform direct tests of the recording and reconciliation of these expenditures and related accounts (other than via analytical review).',
        ]);
        
        Co_Act::create([
            'co_obj_id' => 1,
            'codeCA' => 'EX107(F)',
            'control_act' => 'Actual expenditures are compared to budget regularly; management reviews and approves significant variances.',
        ]);
        
        Co_Act::create([
            'co_obj_id' => 2,
            'codeCA' => 'EX151',
            'control_act' => 'Management reviews recorded purchases (receipts of goods) and amounts recorded for services rendered based on its knowledge of day-to-day activity.',
        ]);
        
        Co_Act::create([
            'co_obj_id' => 8,
            'codeCA' => 'PM105',
            'control_act' => 'Establish policies governing: risks to be underwritten, retention, and premium rating classifications.',
        ]);
        
        Co_Act::create([
            'co_obj_id' => 8,
            'codeCA' => 'PM110',
            'control_act' => 'Board of Director approves all new lines of business.',
        ]);


    }
}
