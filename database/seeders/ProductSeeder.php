<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create 25 random products
        foreach (range(1, 25) as $index) {
            Product::create([
                'name' => $faker->word,
                'barcode' => $faker->unique()->isbn13,
                'price' => $faker->randomFloat(2, 5, 100),
                'inventory' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
