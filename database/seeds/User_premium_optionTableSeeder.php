<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Premium_option;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class User_premium_optionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $options = Premium_option::all();


        foreach ($users as $user){

            $currentDate = new \DateTime();
            $subscriptions = Premium_option::InRandomOrder()->first()->id;
            $randomDate = $faker->dateTimeBetween($currentDate, '+2 days');


            DB::table('user_premium_option')->insert([
                'user_id' => $user->id,
                'premium_option_id' => $subscriptions,
                'start_date' => $currentDate,
                'end_date' => $randomDate
            ]);
        }
    }
}
