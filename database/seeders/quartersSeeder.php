<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\quarter;

class quartersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

  {


    $quarters=
    [
        [
            'name'=>'الرياض'

        ],

    ];
    foreach ($quarters as $qu)
            {
              quarter::insert(['name' => $qu['name']]);
            }


}

}
