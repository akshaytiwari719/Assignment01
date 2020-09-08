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
            \DB::table('orders')->insert([
                [
                    'date'          => $faker->dateTimeBetween($startDate = '2020-08-15', $endDate = '2020-09-01', $timezone = null),
                    'status'        => $faker->randomElement($statusOfOrder),
                    'userId'        => $faker->randomElement($usersId),
                    'quantity'      => $number = $faker->numberBetween($min = 1, $max = 20),
                    'price'         => $price  = $faker->numberBetween($min = 200, $max = 2000),
                    'total'         => $number*$price,
                    'shipDate'      => $faker->dateTimeBetween($startDate = '2020-09-05', $endDate = '2020-09-25', $timezone = null),                    
                    'created_at'    =>  date('Y-m-d H:i:s'),
                    'updated_at'    =>  date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
