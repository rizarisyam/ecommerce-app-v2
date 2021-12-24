<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Faker;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'elektronik', 'makanan & minuman', 'komputer & aksesoris', 'perawatan & kecantikan', 'handphone & aksesoris', 'perlengkapan rumah', 'pakaian pria', 'pakaian wanita', 'sepatu pria', 'fashion muslim', 'sepatu pria', 'tas pria', 'fashion bayi & anak', 'aksesoris fashion', 'ibu & bayi', 'jam tangan', 'sepatu wanita', 'kesehatan', 'tas wanita', 'hobi & koleksi', 'otomotif', 'olaraga & outdoor', 'souvenir & pesta', 'buku & alat tulis', 'fotografi', 'voucher'
        ];

        $faker = Faker\Factory::create();
        foreach($category as $row) {
        ProductCategory::create([
            'name' => $row,
            'desc' => $faker->text
        ]);
    }
        //
    }
}
