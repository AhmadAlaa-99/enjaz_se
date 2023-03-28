<?php
namespace Database\Seeders;
use App\Models\Nationalitie;
use App\Models\quarter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('nationalities')->insert([
                            'name'=>'سعودي'

        ]);
     


    }
}
