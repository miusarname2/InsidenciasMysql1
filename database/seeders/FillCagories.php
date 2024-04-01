<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FillCagories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();

        for ($i=1; $i < 11; $i++) {
            DB::table('Category')->insert([
                'CategoryName'=>$faker->domainName,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
