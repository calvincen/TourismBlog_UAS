<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->unique()->email,
            'password' => bcrypt('12345'),
            'phone' => $faker->phoneNumber,
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->unique()->email,
            'password' => bcrypt('12345'),
            'phone' => $faker->phoneNumber,
            'role' => 'admin'
        ]);

        for($i = 1; $i <= 3; $i++){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt('12345'),
                'phone' => $faker->phoneNumber,
                'role' => 'user'
            ]);
        }
    }
}
