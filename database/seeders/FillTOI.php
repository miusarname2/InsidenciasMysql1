<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FillTOI extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i < 11; $i++) {
            DB::table('TypeOfInsidence')->insert([
                'TOI'=>$faker->streetName,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
