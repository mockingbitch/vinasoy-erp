<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
use Carbon\Carbon;

class NhaCungCapTableSeeder extends Seeder
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

        for ($i = 2; $i < $limit; $i++) {
            DB::table('tbl_nhacungcap')->insert([
                'tenNhaCC' => $faker->name,
                'maSoThue' => $faker->ean13,
                'sdt' => $faker->ean13,
                'email' => $faker->email,
                'fax' => $faker->ean13,
                'website' => $faker->name . '.com',
                'diaChi' => $faker->address,
                'trangThai' => $faker->randomElement($array = array (0, 1)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
