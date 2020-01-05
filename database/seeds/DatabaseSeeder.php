<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('ClothingSizeTableSeeder');
         $this->call('ClothingBrandTableSeeder');
         $this->call('ClothesByUsersTableSeeder');
    }
}
