<?php

use App\Performance;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_performanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all();

        foreach ($users as $user){
            $performance_id = Performance::InRandomOrder()->first()->id;

            DB::table('user_performance')->insert([
                'user_id' => $user->id,
                'performance_id' => $performance_id,
            ]);
        }
    }
}
