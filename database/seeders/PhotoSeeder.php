<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $photo = new Photo();
            $photo->title = $faker->words(3, true);
            $photo->slug = Str::slug($photo->title, '-');
            $photo->description = $faker->text(300);
            $photo->image = $faker->imageUrl(600, 400, 'photos', true, $photo->title, true, 'jpg');
            $photo->in_evidence = $faker->boolean();
            $photo->is_published = $faker->boolean();

            $photo->save();
        }
    }
}
