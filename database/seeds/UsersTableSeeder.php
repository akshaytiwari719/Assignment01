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

        DB::table('users')->insert([
            [
                'name'          => $faker->name,
                'email'         => $faker->unique()->safeEmail,
                'contact_No'    => $faker->phoneNumber,
                'address'       => $faker->address,
                'postal_Code'   => $faker->postcode,
                'state'         => $faker->state,
                'city'          => $faker->address,
                'country'       => $faker->country,
                'created_at'    =>  date('Y-m-d H:i:s'),
                'updated_at'    =>  date('Y-m-d H:i:s')
            ]
        ]);
    }
}
