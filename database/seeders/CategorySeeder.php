<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories=[

            [
                'name' =>'celulares y tablet',
                'slug' => Str::slug('celulares y tablets'),
                'icon' =>'<i class="fas fa-mobile"></i>'
            ],
            [
                'name' =>'tv audio y video',
                'slug' => Str::slug('tv audio y video'),
                'icon' =>'<i class="fas fa-tv"></i>'
            ],
            [
                'name' =>'consola y videojuegos',
                'slug' => Str::slug('consola y videojuegos'),
                'icon' =>'<i class="fas fa-gamepad"></i>'
            ],
            [
                'name' =>'computacion',
                'slug' => Str::slug('computacion'),
                'icon' =>'<i class="fas fa-laptop"></i>'
            ],
            [
                'name' =>'moda',
                'slug' => Str::slug('moda'),
                'icon' =>'<i class="fas fa-tshirt"></i>'
            ],
        ];
   
        foreach($categories as $category){
            $category=  Category::factory(1)->create($category)->first();

           $brands= Brand::factory(4)->create();

           foreach ($brands as $brand ) {
                $brand->categories()->attach($category->id);
           }

        }
    }
}
