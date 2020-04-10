<?php

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Ticket::create([
                'shop_id' => $i,
                'title' => Arr::random(['カレー大盛り無料','コーヒー回数券','人気メニューとデザート１品無料']),
                'price' => Arr::random(['1000','2000','3000']),
                'description' => Arr::random(['+100円の大盛りを無料にします。','１０回の値段で１１回使用可能です','人気のデザートを無料でサービスします！']),
                'remaing' => Arr::random([1,11]),
            ]);
        }
    }
}