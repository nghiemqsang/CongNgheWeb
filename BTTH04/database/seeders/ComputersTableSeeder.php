<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->unique()->word . '-' . $index,
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP ProDesk 600', 'Lenovo ThinkCentre M90']),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Windows 11 Pro', 'Ubuntu 20.04']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-10700', 'AMD Ryzen 5 5600X']),
                'memory' => $faker->numberBetween(8, 64),
                'available' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

