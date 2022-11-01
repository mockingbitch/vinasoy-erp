<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class NhanVienTableSeeder extends Seeder
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
            DB::table('tbl_nhanvien')->insert([
                'user_id' => $i,
                'hoTen' => $faker->name,
                'gioiTinh' => $faker->randomElement($array = array (0, 1)),
                'thuongTru' => $faker->address,
                'tamTru' => $faker->address,
                'cccd' => $faker->ean13,
                'hocVan' => '12/12',
                'ngoaiNgu' => 'Có',
                'chucvu_id' => $faker->randomElement($array = array (1, 2, 3, 4)),
                'maphong_id' => $faker->randomElement($array = array (1, 2, 3, 4, 5, 6)),
                'stk' => $faker->ean13,
                'nganHang' => 'Techcombank'
            ]);
        }
    }
}
