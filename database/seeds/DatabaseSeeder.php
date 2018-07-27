<?php

use Illuminate\Database\Seeder;
use App\Branch;
use App\Material;

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
            'branch' => 'Óptica del Sur'
        ])->users()->createMany([
            [
                'name' => 'Fabián Montero',
                'username' => 'fabian.montero',
                'password' => bcrypt('123456')
            ]
        ]);

        Material::create([
            'material' => 'Material 1'
        ]);
        Material::create([
            'material' => 'Material 2'
        ]);
        Material::create([
            'material' => 'Material 3'
        ]);

        factory(App\Patient::class, 50)->create();
    }
}
