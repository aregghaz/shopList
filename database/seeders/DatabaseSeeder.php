<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        for($i = 1; $i<=5; $i++) {
            DB::table('products')->insert([
                'id' => $i,
                'user_id' => '1',
                'user' => 'admin',
                'category_id' => '1',
                'sub_category_id' => '0',
                'product_id' => $i,
                'price' => '1222',
                'images' => '["1.jpg","2.jpg"]',
                'sku' => '1',
                'availability' => '1',
                'size' => '11,89,98',
                'colors' => '["#000000","#ff1a1a"]',
                'status' => '1',
                'created_at' => '2019-03-01 10:03:47',
                'updated_at' => '2019-03-01 20:27:24',
            ]);
            DB::table('product_names')->insert([
                'id' => $i,
                'nameEn' => Str::random(10),
                'nameRu' => Str::random(10),
                'nameAm' => Str::random(10),
                'descriptionEn' => Str::random(70),
                'descriptionRu' => Str::random(70),
                'descriptionAm' => Str::random(70),
                'created_at' => '2019-03-01 10:03:47',
                'updated_at' => '2019-03-01 20:27:24',
            ]);
            DB::table('companies')->insert([
                'name' => 'For You',
                'user_id' => $i,
                'logo' => '1.jpg',
                'created_at' => '2019-03-01 10:03:47',
                'updated_at' => '2019-03-01 20:27:24',
            ]);

        }     for($i = 6; $i<=10; $i++) {
        DB::table('products')->insert([
            'id' => $i,
            'user_id' => '6',
            'user' => 'admin',
            'category_id' => '6',
            'sub_category_id' => '0',
            'product_id' => $i,
            'price' => '1400',
            'images' => '["2.jpg","2.jpg"]',
            'sku' => '1',
            'availability' => '1',
            'size' => '1,7,9,3',
            'colors' => '["#000000","#ffff00","#ff1a1a"]',
            'status' => '1',
            'created_at' => '2019-03-01 10:03:47',
            'updated_at' => '2019-03-01 20:27:24',
        ]);
        DB::table('product_names')->insert([
            'id' => $i,
            'nameEn' => 'Watch',
            'nameRu' => 'Часи',
            'nameAm' => 'Ժամ',
            'descriptionEn' => 'Watch Watch Watch WatchWatch Watch Watch Watch Watch Watch Watch',
            'descriptionRu' => 'Часи Часи Часи Часи Часи ЧасиЧаси Часи Часи Часи Часи Часи',
            'descriptionAm' => 'Ժամ Ժամ Ժամ ԺամԺամ Ժամ Ժամ Ժամ ԺամԺամ Ժամ ԺամԺամ Ժամ ԺամԺամ   Ժամ  Ժամ Ժամ ',
            'created_at' => '2019-03-01 10:03:47',
            'updated_at' => '2019-03-01 20:27:24',
        ]);
        DB::table('companies')->insert([
            'name' => 'only you',
            'user_id' => $i,
            'logo' => '1.jpg',
            'created_at' => '2019-03-01 10:03:47',
            'updated_at' => '2019-03-01 20:27:24',
        ]);

    }
        for($j = 11; $j<=15; $j++) {
            DB::table('products')->insert([
                'id' => $j,
                'user_id' => '9',
                'user' => 'admin',
                'category_id' => '8',
                'sub_category_id' => '0',
                'product_id' => $j,
                'price' => '15000',
                'images' => '["3.jpg","4.jpg"]',
                'sku' => '1',
                'availability' => '1',
                'size' => '11,8,9,7',
                'colors' => '["#ff1a1a"]',
                'status' => '3',
                'created_at' => '2019-03-01 10:03:47',
                'updated_at' => '2019-03-01 20:27:24',
            ]);
            DB::table('product_names')->insert([
                'id' => $j,
                'nameEn' => 'Wallet',
                'nameRu' => 'Бумажник',
                'nameAm' => 'Դրամապանակ',
                'descriptionEn' => 'Wallet Wallet Wallet WalletWallet Wallet Wallet Wallet Wallet Wallet Wallet Wallet Wallet Wallet',
                'descriptionRu' => 'Бумажник БумажникБумажник Бумажник Бумажник Бумажник БумажникБумажникж Бумажник Бумажник Бумажник Бумажник ',
                'descriptionAm' => 'Դրամապանակ Դրամապանակ Դրամապանակ Դրամապանակ Դրամապանակ Դրամապանակ Դրամապանակ Դրամապանակ Դրամապանակ Դրամապանակ Դրամապանակ Դրամապանակ',
                'created_at' => '2019-03-01 10:03:47',
                'updated_at' => '2019-03-01 20:27:24',
            ]);
        }  for($j = 16; $j<=20; $j++) {
        DB::table('products')->insert([
            'id' => $j,
            'user_id' => '2',
            'user' => 'admin',
            'category_id' => '8',
            'sub_category_id' => '0',
            'product_id' => $j,
            'price' => '9999',
            'images' => '["5.jpg","5.jpg"]',
            'sku' => '1',
            'availability' => '1',
            'size' => '1,2,4',
            'colors' => '["#000000","#ffff00","#ff1a1a"]',
            'status' => '3',
            'created_at' => '2019-03-01 10:03:47',
            'updated_at' => '2019-03-01 20:27:24',
        ]);
        DB::table('product_names')->insert([
            'id' => $j,
            'nameEn' => 'Watch',
            'nameRu' => 'Часи',
            'nameAm' => 'Ժամ',
            'descriptionEn' => 'Watch Watch Watch WatchWatch Watch Watch Watch Watch Watch Watch',
            'descriptionRu' => 'Часи Часи Часи Часи Часи ЧасиЧаси Часи Часи Часи Часи Часи',
            'descriptionAm' => 'Ժամ Ժամ Ժամ ԺամԺամ Ժամ Ժամ Ժամ ԺամԺամ Ժամ ԺամԺամ Ժամ ԺամԺամ   Ժամ  Ժամ Ժամ ',
            'created_at' => '2019-03-01 10:03:47',
            'updated_at' => '2019-03-01 20:27:24',
        ]);
    }
        for($q = 21; $q<30; $q++) {
            DB::table('products')->insert([
                'id' => $q,
                'user_id' => '4',
                'user' => 'admin',
                'category_id' => '1',
                'sub_category_id' => '0',
                'product_id' => $q,
                'price' => '1580',
                'images' => '["5.jpg","5.jpg"]',
                'sku' => '1',
                'availability' => '1',
                'size' => '11,13,25',
                'colors' => '["##ff1a1a","#ff1a1a"]',
                'status' => '2',
                'created_at' => '2019-03-01 10:03:47',
                'updated_at' => '2019-03-01 20:27:24',
            ]);
            DB::table('product_names')->insert([
                'id' => $q,
                'nameEn' => Str::random(10),
                'nameRu' => Str::random(10),
                'nameAm' => Str::random(10),
                'descriptionEn' => Str::random(70),
                'descriptionRu' => Str::random(70),
                'descriptionAm' => Str::random(70),
                'created_at' => '2019-03-01 10:03:47',
                'updated_at' => '2019-03-01 20:27:24',
            ]);
        }

    }
}
