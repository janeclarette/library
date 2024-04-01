<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class AuthorsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $faker = Faker::create(); // Create Faker instance


            // Generate fake authors
            for ($i = 0; $i < 5; $i++) { // Generate 10 fake authors, you can adjust the count as needed
                DB::table('authors')->insert([
                    'name' => $faker->name, // Generate a random name
                    'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'), // Generate a random date of birth
                    'img_path' => null, // Set the image path to null for now
                ]);
            }
        }
    }
}
