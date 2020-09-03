<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categoryName = ["Men's Fashion","Women's Fashion","Kid's Fashion"];
        $categoryDescription = ["Where you can Design yourself",
                                "Make every outfit count.",
                                "Where you can find comfort"
                               ];  

        foreach(range(1,20) as $key){
            \DB::table('categories')->insert([
                [
                    'name'          => $faker->randomElement($categoryName),
                    'description'   => $faker->randomElement($categoryDescription),                    
                    'created_at'    =>  date('Y-m-d H:i:s'),
                    'updated_at'    =>  date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
