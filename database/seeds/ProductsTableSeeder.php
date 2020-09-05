<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categoryId = \DB::table('categories')->pluck('id');
        $tagId = \DB::table('tags')->pluck('id');
        foreach(range(1,20) as $key){
            DB::table('products')->insert([
                [
                    'name'              => $faker->word,
                    'description'       => $faker->sentence(),
                    'quantityPerUnit'   => $faker->numberBetween($min = 1, $max = 20),
                    'unitPrice'         => $faker->numberBetween($min = 200, $max = 2000),
                    'categoryId'        => $faker->randomElement($categoryId),
                    'tagId'             => $faker->randomElement($tagId),
                    'created_at'    =>  date('Y-m-d H:i:s'),
                    'updated_at'    =>  date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
