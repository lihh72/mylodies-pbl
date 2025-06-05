<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $categories = ['Guitar', 'Drum', 'Keyboard', 'Violin', 'Saxophone', 'Microphone', 'Amplifier'];

        for ($i = 0; $i < 20; $i++) {
            $name = $faker->unique()->words(3, true);

            // Generate highlights sebagai array of arrays ['value' => '...']
            $highlights = [];
            $highlightCount = rand(2, 5);
            for ($h = 0; $h < $highlightCount; $h++) {
                $highlights[] = ['value' => $faker->sentence(3)];
            }

            // Generate included_items sebagai array of arrays ['value' => '...']
            $includedItems = [];
            $includeCount = rand(1, 4);
            for ($inc = 0; $inc < $includeCount; $inc++) {
                $includedItems[] = ['value' => $faker->word()];
            }

            DB::table('products')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'category' => $faker->randomElement($categories),
                'rental_price_per_day' => $faker->numberBetween(30000, 200000),
                'description' => $faker->sentence(),
                'full_description' => $faker->paragraph(4),
                'images' => json_encode([
                    'https://picsum.photos/640/480?random=' . rand(1, 10000),
                    'https://picsum.photos/640/480?random=' . rand(10001, 20000),
                ]),
                'highlights' => json_encode($highlights),
                'included_items' => json_encode($includedItems),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
