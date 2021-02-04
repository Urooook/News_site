<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'=>'Спорт',
                'slug'=>'sport'
            ],
            [
                'name'=>'Политика',
                'slug'=>'politics'
            ],
            [
                'name'=>'It',
                'slug'=>'it'
            ]
            ];
            DB::table('categories')->insert($categories);
    }
}
