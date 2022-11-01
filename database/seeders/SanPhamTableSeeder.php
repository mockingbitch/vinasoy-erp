<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
use Carbon\Carbon;

class SanPhamTableSeeder extends Seeder
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

        for ($i = 1; $i < $limit; $i++) {
            DB::table('tbl_sanpham')->insert([
                'tenSP' => $faker->name,
                'danhmuc_id' => $faker->randomElement($array = array (1, 2, 3)),
                'nhacungcap_id' => $faker->randomElement($array = array (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
                'donGia' => $faker->numberBetween($min = 10, $max = 999) . '000',
                'moTa' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                'img' => 'default.jpg',
                'trangThai' => $faker->randomElement($array = array (1)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
