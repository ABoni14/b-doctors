<?php

use Illuminate\Database\Seeder;
use App\Premium_option;

class Premium_OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $premiumName = ['Basic', 'Intermediate', 'Advanced', 'Ultimate'];
        $level = ['1','2','3','4',];
        $duration = ['0','24','72','144'];
        $price = ['0','2.99','5.99','9.99'];

        for($i = 0; $i < 4; $i++) {
            $new_premium = new Premium_option();
            $new_premium->name = $premiumName[$i];
            $new_premium->level = $level[$i];
            $new_premium->duration = $duration[$i];
            $new_premium->price = $price[$i];
            $new_premium->save();
        }
    }
}
