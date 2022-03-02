<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;
use App\User;
use PHPUnit\Framework\Constraint\Count;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();


        foreach ($users as $user){

            $random = rand(1,5);

            for($i = 0; $i < $random; $i++) {
                $new_message = new Message();
                $new_message->user_id = $user->id;
                $new_message->email = $faker->email();
                $new_message->content = $faker->paragraph();
                $new_message->first_name = $faker->firstNameMale();
                $new_message->save();
            }
        }

    }
}
