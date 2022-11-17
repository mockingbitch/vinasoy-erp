<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => '$2a$12$gYU0XbUgPzUFZfzYWiTTeOgk5waZjKqZwUqVVKAKwyMN0JIidEqzC',
                'role' => $faker->randomElement($array = array ('MANAGER', 'EMPLOYEE','WAREHOUSESTAFF', 'USER'))
            ]);
        }
    }
}
