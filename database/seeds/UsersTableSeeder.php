<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i <100; $i++) {
            $new_user = new User();
            $new_user->first_name = $faker->firstNameMale();
            $new_user->last_name = $faker->lastName();
            $new_user->email = $faker->email();
            $new_user->password = Hash::make(12341234);
            $new_user->address = $faker->streetAddress();
            $new_user->slug =  Str::slug($new_user->first_name . $new_user->last_name, '-');
            $new_user->save();
        }
    }
}
