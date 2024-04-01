<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FillTrainers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Trainer')->insert(
            [
                'Name'=>"Oscar",
                'LastName'=>"Alvarez",
                'Email'=>"oscarm.alvarezg@gmail.com"
            ]
        );

        $faker =Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('Trainer')->insert(
                [
                    'Name'=>$faker->name,
                    'LastName'=>$faker->lastName,
                    'Email'=>$faker->unique()->email,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
