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
            $subscription = Premium_option::InRandomOrder()->first()->id;

            //get the duration of each premium options and parse it to make it into a end_date format value
            $duration = Premium_option::select('duration')->where('id', $subscription)->get()->map(function($val) {
                return $val->duration;
            });
            $parsedDuration = $duration->pipe(function($duration){
                return $duration->pop();
            });
            $endDate = date("Y-m-d H:m:s", strtotime(sprintf("+%d hours",$parsedDuration )));


            DB::table('user_premium_option')->insert([
                'user_id' => $user->id,
                'premium_option_id' => $subscription,
                'start_date' => $currentDate,
                'end_date' => $endDate
            ]);
        }
    }
}
