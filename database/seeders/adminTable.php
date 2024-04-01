<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use DB;

class adminTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        // Generate fake users
        for ($i = 0; $i < 2; $i++) { // Generate 2 fake admins, you can adjust the count as needed
            DB::table('admins')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('admin123'), // Hash the password
                'email_verified_at' => null// Set email_verified_at to current timestamp
            ]);
        }
    }
}
