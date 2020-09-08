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
        $orderId = \DB::table('orders')->pluck('id');
        $productId = \DB::table('products')->pluck('id');
        foreach(range(1,20) as $key){
            DB::table('order_products')->insert([
                [
                    'orderId'        => $faker->randomElement($orderId),
                    'productId'      => $faker->randomElement($productId),
                    'created_at'     =>  date('Y-m-d H:i:s'),
                    'updated_at'     =>  date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
