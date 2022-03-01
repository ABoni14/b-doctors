<?php

use Illuminate\Database\Seeder;
use App\Performance;
use Faker\Generator as Faker;

class PerformancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $arr = ['Prima visita', 'Prima visita Specialistica', 'Visita di controllo', 'Prescrizioni Analisi di laboratorio', ];

        foreach($arr as $item) {
            $new_performance = new Performance();
            $new_performance->name = $item;
            $new_performance->description = $faker->sentence(10);
            $new_performance->save();
        }
    }
}
