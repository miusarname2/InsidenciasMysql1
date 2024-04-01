<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FillInsidences extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();

        for ($i=1; $i < 11; $i++) {
            DB::table('insidences')->insert([
                'CategoryId'=>$faker->numberBetween(1,10),
                'TypeOfInsidenceId'=>$faker->numberBetween(1,10),
                'AreaId'=>$faker->numberBetween(1,10),
                'ReporterName'=>$faker->name,
                'VenueSpecific'=>$faker->streetName,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
