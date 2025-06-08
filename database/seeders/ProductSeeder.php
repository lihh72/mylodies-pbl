<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $categories = ['Guitar', 'Drum', 'Keyboard', 'Violin', 'Saxophone', 'Microphone', 'Amplifier'];

        // Ambil semua file gambar dari storage/app/public/instruments
        $imageFiles = File::files(storage_path('app/public/instruments'));

        // Pastikan ada minimal 2 gambar
        if (count($imageFiles) < 2) {
            throw new \Exception("Minimal harus ada 2 gambar di folder storage/app/public/instruments");
        }

        for ($i = 0; $i < 20; $i++) {
            $name = $faker->unique()->words(3, true);

            // Highlights
            $highlights = [];
            for ($h = 0; $h < rand(2, 5); $h++) {
                $highlights[] = ['value' => $faker->sentence(3)];
            }

            // Included items
            $includedItems = [];
            for ($inc = 0; $inc < rand(1, 4); $inc++) {
                $includedItems[] = ['value' => $faker->word()];
            }

            // Ambil 2 gambar random dari folder instruments
            $randomImages = collect($imageFiles)
                ->shuffle()
                ->take(2)
                ->map(fn ($file) => 'instruments/' . $file->getFilename())

                ->toArray();

            DB::table('products')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'category' => $faker->randomElement($categories),
                'rental_price_per_day' => $faker->numberBetween(30000, 200000),
                'description' => $faker->sentence(),
                'full_description' => $faker->paragraph(4),
                'images' => json_encode($randomImages),
                'highlights' => json_encode($highlights),
                'included_items' => json_encode($includedItems),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
