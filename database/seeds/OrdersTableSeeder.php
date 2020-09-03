<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $usersId = \DB::table('users')->pluck('id');
        $statusOfOrder = ['confirm','packed','delivered'];

        foreach(range(1,20) as $key){
            \DB::table('order')->insert([
                [
                    'date'          => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'status'        => $faker->randomElement($statusOfOrder),
                    'userId'        => $faker->randomElement($usersId),                    
                    'created_at'    =>  date('Y-m-d H:i:s'),
                    'updated_at'    =>  date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
