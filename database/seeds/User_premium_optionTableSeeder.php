<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Premium_option;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class User_premium_optionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $options = Premium_option::all();


        foreach ($users as $user){

            $currentDate = new \DateTime();
            $subscriptions = Premium_option::InRandomOrder()->first()->id;
            // $optionDuration = $options->select('duration')->where('id', $subscriptions)->first();

            DB::table('user_premium_option')->insert([
                'user_id' => $user->id,
                'premium_option_id' => $subscriptions,
                'start_date' => $currentDate,
                'end_date' => $currentDate
            ]);
        }
    }
}
