<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=8;$i++)
        {
            Product::create([

                'category_id'=>1,

                'name'=>"Premium Product $i",

                'slug'=>"premium-product-$i",

                'description'=>"Premium quality product",

                'price'=>rand(500,3000),

                'stock'=>100,

                'featured'=>1

            ]);
        }
    }
}