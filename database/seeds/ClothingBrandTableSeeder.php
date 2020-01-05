<?php

use Illuminate\Database\Seeder;

class ClothingBrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ClothingBrand::class, 5 ) -> create();
    }
}
