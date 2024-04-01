<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use DB;


class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $address = ['Paranaque City', 'Taguig City', 'Muntinlupa City', 'Pasay City', 'Makati City'];

        // Generate fake users
        for ($i = 0; $i < 2; $i++) { // Generate 10 fake users, you can adjust the count as needed
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'), // Hash the password
                'address' => $faker->randomElement($address),
                'email_verified_at' => Carbon::now(), // Set email_verified_at to current timestamp
            ]);
        }

    }
}
