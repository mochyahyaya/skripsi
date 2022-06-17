<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\Pet;

class GroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Groom::create([
            'pet_id' => 1,
            'service' => 'Lengkap',
            'status' => 'Diproses',
            'price' => '50000',
            'pickup' => 'Ya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Groom::create([
            'pet_id' => 2,
            'service' => 'Jamur',
            'status' => 'Diproses',
            'price' => '45000',
            'pickup' => 'Ya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Groom::create([
            'pet_id' => 1,
            'service' => 'Lengkap',
            'status' => 'Selesai',
            'price' => '50000',
            'pickup' => 'Ya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Groom::create([
            'pet_id' => 2,
            'service' => 'Jamur',
            'status' => 'Selesai',
            'price' => '45000',
            'pickup' => 'Ya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
