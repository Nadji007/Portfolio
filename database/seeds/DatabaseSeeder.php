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
        factory('App\User',2)->create();
        factory('App\Ngd_about',10)->create();
        factory('App\Ngd_service',2)->create();
       
    }
}
