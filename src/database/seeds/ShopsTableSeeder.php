<?php

use Illuminate\Database\Seeder;
use App\Models\Shop;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Shop::create([
                'user_id' => $i,
                'shop_name' => $faker->lastKanaName.Arr::random(['屋','SHOP','店']),
                'url' => $faker->url,
                'postcode' => $faker->postcode(),
                'prefecture' => $faker->prefecture(),
                'city' => $faker->city(),
                'block' => $faker->streetAddress(),
                'name' => $faker->name,
                'mobile' => $faker->phoneNumber,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'shop_category' => Arr::random(['カフェ','居酒屋','カレー屋']),
                'description' => Arr::random(['本格派のスパイスカレー','日本酒に力を入れてます','日本一のバリスタが腕を振るいます']),
            ]);
        }
    }
}