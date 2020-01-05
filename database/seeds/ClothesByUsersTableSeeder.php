<?php

use Illuminate\Database\Seeder;

class ClothesByUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ClotheByUser::class, 20 ) -> create();
    }
}
