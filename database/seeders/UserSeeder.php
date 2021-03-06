<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'          => 'Admin',
                'email'         => 'admin@admin.com',
                'password'      => Hash::make('admin'),
                'role_id'       => 1,
                'phone_number'  => '081245657',
                'address'       => 'Jakarta',
                'photo'         => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
        DB::table('users')->insert([
                'name'          => 'Dokter',
                'email'         => 'dokter@dokter.com',
                'password'      => Hash::make('dokter'),
                'role_id'       => 2,
                'phone_number'  => '081345564',
                'address'       => 'Bandung',
                'photo'         => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
        ]);
        DB::table('users')->insert([
                'name'          => 'User',
                'email'         => 'user@user.com',
                'password'      => Hash::make('user'),
                'role_id'       => 3,
                'phone_number'  => '08145655',
                'address'       => 'Semarang',
                'photo'         => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
        ]);        
        DB::table('users')->insert([
                'name'          => 'Jane',
                'email'         => 'jane@user.com',
                'password'      => Hash::make('jane'),
                'role_id'       => 3,
                'phone_number'  => '08145655',
                'address'       => 'Semarang',
                'photo'         => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
        ]);
    }
}
