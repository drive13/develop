<?php

namespace Database\Seeders;

use App\Models\Co_Obj;
use Illuminate\Database\Seeder;

class CoObjSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Co_Obj::create([
            'kodeBisCyc' => 'EX10',
            'kodeCO' => 'EX1015',
            'control_obj' => 'Purchase orders are placed only for approved requisitions.',
            'description' => 'Purchase requisitions are normally used only if an independent purchasing function has been established.  A purchasing function procures goods and services to fulfill the organization’s requirements, as approved by management.  The purchasing function should not acquire goods or services for which purchase requisitions have not been approved by management.  Purchase requisitions might be paper-based or entered on-line, or they might originate from an inventory management system.',
        ]);

        Co_Obj::create([
            'kodeBisCyc' => 'EX10',
            'kodeCO' => 'EX1025',
            'control_obj' => 'Purchase orders are entered accurately.',
            'description' => 'Inaccurate input of purchase orders could lead to financial losses due to incorrect goods or services being purchased.',
        ]);
        
        Co_Obj::create([
            'kodeBisCyc' => 'EX10',
            'kodeCO' => 'EX1035',
            'control_obj' => 'All purchase orders issued are input and processed.',
            'description' => 'If purchase order entry or processing is incomplete, receipts of goods and/or processing of invoices might be hampered.  Warehouse employees are normally instructed only to accept goods for which purchase orders have been issued, and only up to the quantity specified in each purchase order.  In invoice processing, the invoice is normally matched with the purchase order to verify the price and the payment terms.',
        ]);

        Co_Obj::create([
            'kodeBisCyc' => 'PM10',
            'kodeCO' => 'PM1005',
            'control_obj' => 'Only enter into policies which have an acceptable level of risk',
            'description' =>'-',
        ]);
        
        Co_Obj::create([
            'kodeBisCyc' => 'PM10',
            'kodeCO' => 'PM1010',
            'control_obj' => 'Denied applications are returned to the applicant along with any deposit premium',
            'description' =>'-',
        ]);
        
        Co_Obj::create([
            'kodeBisCyc' => 'MO',
            'kodeCO' => 'MO01',
            'control_obj' => 'lorem ipsum doler amet Manage Operation',
            'description' =>'-',
        ]);
        
        Co_Obj::create([
            'kodeBisCyc' => 'MA',
            'kodeCO' => 'MA01',
            'control_obj' => 'lorem ipsum doler amet Manage Access',
            'description' =>'-',
        ]);
        
        
    }
}
