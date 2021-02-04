<?php

use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array{
        $data = [];
        //Faker $faker
        $faker = Faker\Factory::create('ru_Ru');

        for($i=0; $i<15; $i++){
            $data[]= [
                "title"=> $faker->realText(rand(10,20)),
                // "category"=> rand(1,2),
                "text"=> $faker->realText(rand(1000,3000)),
            ];
        }

        return $data;
    }
}
