<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\Pet;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pet::create([
            'name' => 'Kucing',
            'user_id' => 3,
            'weight' => 2,
            'race' => 'Anggora',
            'colour' => 'Hitam',
            'gender' => 'Betina',
            'type_pet_id' => 1,
            'birthday' => '2022-01-12',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Pet::create([
            'name' => 'Anjing',
            'user_id' => 3,
            'weight' => 6,
            'race' => 'Bulldog',
            'colour' => 'Hitam',
            'gender' => 'Jantan',
            'type_pet_id' => 2,
            'birthday' => '2022-02-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Pet::create([
            'name' => 'Kucing Jantan',
            'user_id' => 1,
            'weight' => 2,
            'race' => 'Anggora',
            'colour' => 'Kuning',
            'gender' => 'Jantan',
            'type_pet_id' => 2,
            'birthday' => '2022-02-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Pet::create([
            'name' => 'Anjing Jantan',
            'user_id' => 1,
            'weight' => 6,
            'race' => 'Bulldog',
            'colour' => 'Hitam',
            'gender' => 'Jantan',
            'type_pet_id' => 2,
            'birthday' => '2022-02-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
