<?php

use Illuminate\Database\Seeder;

class ClothingSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ClothingSize::class, 5 ) -> create();

    }
}
