<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\TypePet;
class TypePetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_pets')->insert(
            [
                'name'      => 'Kucing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('type_pets')->insert(
            [
                'name'      => 'Anjing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);    
    }
}
