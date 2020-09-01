<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,20) as $key){
            DB::table('users')->insert([
                [
                    'name'          => $faker->name,
                    'email'         => $faker->unique()->safeEmail,
                    'contactNo'     =>  $faker->phoneNumber,
                    'address'       => $faker->address,
                    'postalCode'    => $faker->postcode,
                    'state'         => $faker->state,
                    'city'          => $faker->address,
                    'country'       => $faker->country,
                    'created_at'    =>  date('Y-m-d H:i:s'),
                    'updated_at'    =>  date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
