<?php

use Illuminate\Database\Seeder;
use App\Base;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 3 ; $i+=.25) { 
            Base::create([
                'base' => 'Base 4',
                'addition' => $i,
                'quantity' => 0,
                'branch_id' => 1
            ]);
        }
        
        for ($i=1; $i < 3 ; $i+=.25) { 
            Base::create([
                'base' => 'Base 6',
                'addition' => $i,
                'quantity' => 0,
                'branch_id' => 1
            ]);
        }
    }
}
