<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Jill Humpty',
            'email' => 'jill@demo.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('demo'),
            'username' => 'jill',
            'active_status' => 1,
            'phone' => '0987654321',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
