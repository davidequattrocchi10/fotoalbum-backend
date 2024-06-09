<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categories = ['Nature', 'People', 'Travel', 'Art', 'Activities', 'Sport and Music'];

        foreach ($categories as $cat) {
            $category = new Category();
            $category->name = $cat;
            $category->slug = Str::slug($cat, '-');
            $category->description = $faker->text(200);
            $category->save();
        }
    }
}
