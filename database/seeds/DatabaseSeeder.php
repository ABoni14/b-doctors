<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(UserSpecializationTableSeeder::class);
        $this->call(Premium_OptionsTableSeeder::class);
        $this->call(PerformancesTableSeeder::class);
        $this->call(User_premium_optionTableSeeder::class);
        $this->call(User_performanceTableSeeder::class);
    }
}
