<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Specialization;
use Illuminate\Support\Facades\DB;

class UserSpecializationTableSeeder extends Seeder
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
            DB::table('user_specialization')->insert([
                'user_id' => $user->id,
                'specialization_id' => Specialization::inRandomOrder()->first()->id
            ]);
        }
    }
}
