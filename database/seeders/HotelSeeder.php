<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
            'pet_id' => 1,
            'start_at' => '2022-06-17 04:21:38',
            'end_at' => '2022-06-20 04:21:38',
            'status' => 'Diproses',
            'price' => '60000',
            'pickup' => 'Ya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Hotel::create([
            'pet_id' => 2,
            'start_at' => '2022-06-20 04:21:38',
            'end_at' => '2022-06-25 04:21:38',
            'status' => 'Diproses',
            'price' => '100000',
            'pickup' => 'Ya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Hotel::create([
            'pet_id' => 1,
            'start_at' => '2022-06-15 04:21:38',
            'end_at' => '2022-06-17 04:21:38',
            'status' => 'Selesai',
            'price' => '40000',
            'pickup' => 'Ya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Hotel::create([
            'pet_id' => 2,
            'start_at' => '2022-06-17 04:21:38',
            'end_at' => '2022-06-18 04:21:38',
            'status' => 'Selesai',
            'price' => '20000',
            'pickup' => 'Ya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
