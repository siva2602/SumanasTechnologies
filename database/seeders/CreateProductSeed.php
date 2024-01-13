<?php

namespace Database\Seeders;

use App\Models\Product;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Arr;

class CreateProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $faker = Factory::create('en');

            for ($i = 0; $i < 10; $i++) {
                Product::create([
                    'name' => 'Product '. $i + 1,
                    'price' => rand(100,500),
                    'description' => $faker->realText
                ]);
            }
        } catch (Exception $exception) {
            error_log('CreateProductSeed',  $exception->getMessage());
        }
    }
}
