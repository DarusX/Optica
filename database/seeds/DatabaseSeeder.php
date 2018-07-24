<?php

use Illuminate\Database\Seeder;
use App\Branch;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Branch::create([
            'branch' => 'Optica del Sur'
        ])->users()->createMany([
            [
                'name' => 'Fabián Montero',
                'username' => 'fabian.montero',
                'password' => bcrypt('123456')
            ]
        ]);
    }
}
