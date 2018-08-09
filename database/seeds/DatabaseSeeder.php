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
            ],
            [
                'name' => 'Elías Aguirre',
                'username' => 'elias.aguirre',
                'password' => bcrypt('123456')
            ],
        ]);

        Material::create([
            'material' => 'Monofocal - Blanco'
        ]);
        Material::create([
            'material' => 'Monofocal - Antirreflejante'
        ]);
        Material::create([
            'material' => 'Monofocal - Fotocromático'
        ]);
        Material::create([
            'material' => 'Monofocal - Antirreflejante|Fotocromático'
        ]);
        
        Material::create([
            'material' => 'Flat Top - Blanco'
        ]);
        Material::create([
            'material' => 'Flat Top - Antirreflejante'
        ]);
        Material::create([
            'material' => 'Flat Top - Fotocromático'
        ]);
        Material::create([
            'material' => 'Flat Top - Antirreflejante|Fotocromático'
        ]);

        Material::create([
            'material' => 'Blended - Blanco'
        ]);
        Material::create([
            'material' => 'Blended - Antirreflejante'
        ]);
        Material::create([
            'material' => 'Blended - Fotocromático'
        ]);
        Material::create([
            'material' => 'Blended - Antirreflejante|Fotocromático'
        ]);
        
        Material::create([
            'material' => 'Progresivo - Blanco'
        ]);
        Material::create([
            'material' => 'Progresivo - Antirreflejante'
        ]);
        Material::create([
            'material' => 'Progresivo - Fotocromático'
        ]);
        Material::create([
            'material' => 'Progresivo - Antirreflejante|Fotocromático'
        ]);
        

        //factory(App\Patient::class, 50)->create();
    }
}
