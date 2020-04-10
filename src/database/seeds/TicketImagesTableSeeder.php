<?php

use Illuminate\Database\Seeder;
use App\Models\TicketImage;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class TicketImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            TicketImage::create([
                'ticket_id' => $i,
                'path' => 'S3_BUCKET_NAME'.$i,
                // 'key' => $faker->md5(),
            ]);
        }
    }
}
