<?php

use Illuminate\Database\Seeder;
use App\Models\ShopImage;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class ShopImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            ShopImage::create([
                'shop_id' => $i,
                'path' => 'S3_BUCKET_NAME'.$i,
                'real_path' => 'https://harotoko-test.s3-ap-northeast-1.amazonaws.com/%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88+2020-04-10+20.15.26.png',
                // 'key' => $faker->md5(),
            ]);
        }
    }
}
