<?php

use Illuminate\Database\Seeder;
use Faker\factory as faker;

class sksd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=0;$i<=100;$i++)
        {
            DB::table('skin')->insert([
                'nama' => $faker->word(),
                'jenis' => $faker->word(),
                'harga' => $faker->numberBetween(300000,50000),
                'gambar' => $faker->url(),
            ]);
        }
    }
}
