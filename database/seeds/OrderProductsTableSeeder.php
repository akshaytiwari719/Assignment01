<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $orderId = \DB::table('order')->pluck('id');
        $productId = \DB::table('products')->pluck('id');
        foreach(range(1,20) as $key){
            DB::table('order_products')->insert([
                [
                    'orderId'        => $faker->randomElement($orderId),
                    'productId'      => $faker->randomElement($productId),
                    'quantity'       => $number = $faker->numberBetween($min = 1, $max = 20),
                    'price'          => $price  = $faker->numberBetween($min = 200, $max = 2000),
                    'total'          => $number*$price,
                    'shipDate'       => $faker->dateTimeBetween($startDate = '2020-09-05', $endDate = '2020-09-25', $timezone = null),
                    'created_at'     =>  date('Y-m-d H:i:s'),
                    'updated_at'     =>  date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
