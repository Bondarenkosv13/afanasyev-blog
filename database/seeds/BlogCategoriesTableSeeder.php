<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'Без категорий';
        $categories = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 0
        ];

        DB::table('blog_categories')->insert($categories);

        for ($i = 1; $i <= 10; $i++) {
            $cName = 'Категория #' . ($i+1);
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories = [
                'title' => $cName,
                'slug' => Str::slug($cName),
                'parent_id' => $parentId
            ];

            DB::table('blog_categories')->insert($categories);
        }
    }
}
