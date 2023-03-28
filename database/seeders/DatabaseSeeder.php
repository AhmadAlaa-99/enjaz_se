<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CreateAdminUserSeeder;
use Database\Seeders\quartersSeeder;
use Database\Seeders\PermissionTableSeeder;
use Database\Seeders\testSeeders;
use Database\Seeders\NationalitiesTableSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionTableSeeder::class);
        $this->call(quartersSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
         //$this->call(testSeeders::class);




    }
}
