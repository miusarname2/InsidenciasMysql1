<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FillArea extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('Area')->insert([
                'NameArea'=>$faker->city,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
