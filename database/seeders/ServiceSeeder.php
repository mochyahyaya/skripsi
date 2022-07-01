<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'Grooms',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Service::create([
            'name' => 'Hotels',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Service::create([
            'name' => 'Breeds',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
