<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Order::create([
                'user_id' => $i,
                'ticket_id' => $i,
                'ordering_price' => Arr::random([1000,2000,3000,4000,5000]),
                'ordergin_description' => Arr::random(['ドリンクの回数券です','人気メニューとデザート１品サービスします！','10000円分の割引券です。']),
                'remaing' => Arr::random([1,11]),
                'message' =>  Arr::random(['また行きます！','美味しいご飯をいつもありがとう！','次も楽しみしてます！']),
                // 'key' => $faker->md5(),
            ]);
        }
    }
}
