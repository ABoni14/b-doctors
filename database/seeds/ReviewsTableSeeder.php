<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Review;
use Faker\Generator as Faker;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        $gender = $faker->randomElements(['male', 'female']);

        foreach ($users as $user){

            for($i = 0; $i < count($users); $i++) {
                $new_review = new Review();
                $new_review->user_id = $user->id;
                $new_review->vote = rand(1,5);
                $new_review->content = $faker->paragraph();
                $new_review->user_review_name = $faker->firstName($gender);
                $new_review->save();
            }
        }
    }
}
