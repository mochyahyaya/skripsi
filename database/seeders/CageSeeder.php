<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\Cage;

class CageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cage::create([
            'type_cage_id' => 1,
            'number' => 1,
            'count' => 2,
            'counter' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Cage::create([
            'type_cage_id' => 1,
            'number' => 2,
            'count' => 2,
            'counter' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Cage::create([
            'type_cage_id' => 2,
            'number' => 1,
            'count' => 2,
            'counter' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Cage::create([
            'type_cage_id' => 2,
            'number' => 2,
            'count' => 1,
            'counter' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Cage::create([
            'type_cage_id' => 3,
            'number' => 1,
            'count' => 2,
            'counter' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Cage::create([
            'type_cage_id' => 3,
            'number' => 1,
            'count' => 2,
            'counter' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
