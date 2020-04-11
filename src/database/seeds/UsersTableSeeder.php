<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
 
class UsersTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            User::create([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'type' => Arr::random([0,1]),
            ]);
        }
    }
}