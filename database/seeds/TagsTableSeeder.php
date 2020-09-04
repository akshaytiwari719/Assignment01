<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $tagName = ["Best Seller", "Beat the Heat", "Summer Collection", "Winter Collection", "Hoodies",
                    "Kid's Fashion", "100% Cotten", "Leather", "Silk"];
        foreach(range(1,20) as $key){
            DB::table('tags')->insert([
                [
                    'name'          => $faker->randomElement($tagName),
                    'description'   => $faker->sentence(),
                    'created_at'    =>  date('Y-m-d H:i:s'),
                    'updated_at'    =>  date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
