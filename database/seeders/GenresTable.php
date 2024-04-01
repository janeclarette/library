<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class GenresTable extends Seeder
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
           
            $genres = ['Action', 'Adventure', 'Comedy', 'Drama', 'Fantasy'];
            $desc = ['A captivating page-turner', 'A quick and enjoyable read','A light-hearted book',
            'An entertaining and accessible read', 'A refreshing and engaging story'];


            // Generate fake genres
            for ($i = 0; $i < 5; $i++) { // Generate 5 fake genres, you can adjust the count as needed
                DB::table('genres')->insert([
                    'name' => $faker->randomElement($genres), // Generate a random assigned genre
                    'description' => $faker->randomElement($desc), // Generate a random assigned description
                    'img_path' => null, // Set the image path to null for now
                ]);
        }
    }

    }
}
