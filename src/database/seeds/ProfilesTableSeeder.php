<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Profile::create([
                'user_id' => $i,
                'real_name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'postcode' => $faker->postcode(),
                'prefecture' => $faker->prefecture(),
                'city' => $faker->city(),
                'block' => $faker->streetAddress(),
                'birthday' => $faker->dateTimeBetween('-80 years', '-20years')->format('Ymd'),
            ]);
        }
    }
}
