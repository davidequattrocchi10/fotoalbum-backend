<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Paesaggi', 'Animali', 'Famiglie', 'Bambini', 'Città', 'Cultura', 'Cibo', 'Pittura', 'Moda', 'Calcio', 'Basket', 'Tecnologia', 'Stadio', 'Femoneni Naturali'];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag, '-');
            $newTag->save();
        }
    }
}
