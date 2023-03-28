<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\organization;
use Carbon\Carbon;
use App\Models\Broker;
use Faker\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    $faker = Factory::create();


             $user = User::create([
        'name'=>'mohammed',
        'nationalitie_id'=>'1',
        'ID_type'=>'-',
        'ID_num'=>'-',
        'phone'=>'-',
         'gender'=>'male',
        'telephone'=>'-',
        'email'=>'mhd@rawaenjaz.com',
        'role_name'=>'Admin',
        'password'=>bcrypt('mhd@RE110109'),
           ]);

        Broker::create([
            'date_founded'=>'2020/10/10',
            'about'=>'شركة انجاز المستقلة',
            'vision'=>'نتطلع ل مستقبل أفضل في العقارات',
            'mission'=>'معا أفضل',
            'contact_email'=>'wqe@gmail.com',
'contact_address'=>'saudia',
'contact_mobile'=>'093232232',
        ]);
 $role=Role::where('name','Admin')->first();
 $user->assignRole([$role->id]);


   $user = User::create([
        'name'=>'Leases Mangement',
        'nationalitie_id'=>'1',
        'ID_type'=>'gpt4432',
        'ID_num'=>'140440024',
        'phone'=>'09376407234',
         'gender'=>'male',
        'telephone'=>'65544334',
        'email'=>'alaa@gmail.com',
        'role_name'=>'Leases Mangement',
        'password'=>bcrypt('12345678'),
           ]);
 $role=Role::where('name','Leases Mangement')->first();
 $user->assignRole([$role->id]);










   $user = User::create([
        'name'=>'mariam',
        'nationalitie_id'=>'1',
        'ID_type'=>'-',
        'ID_num'=>'-',
        'phone'=>'-',
         'gender'=>'female',
        'telephone'=>'-',
        'email'=>'mariam@rawaenjaz.com',
        'role_name'=>'Assistant_Admin',
        'password'=>bcrypt('mre@RE110109'),
           ]);
 $role=Role::where('name','Assistant_Admin')->first();
 $user->assignRole([$role->id]);

   $user = User::create([
        'name'=>'ruba',
        'nationalitie_id'=>'1',
        'ID_type'=>'-',
        'ID_num'=>'-',
        'phone'=>'-',
         'gender'=>'female',
        'telephone'=>'-',
        'email'=>'ruba@rawaenjaz.com',
        'role_name'=>'Assistant_Admin',
        'password'=>bcrypt('rre@RE110109'),
           ]);
 $role=Role::where('name','Assistant_Admin')->first();
 $user->assignRole([$role->id]);















   $user = User::create([
        'name'=>'Contracts Management',
        'nationalitie_id'=>'1',
        'ID_type'=>'gp43t4342',
        'ID_num'=>'14044340024',
        'phone'=>'093760437234',
         'gender'=>'male',
        'telephone'=>'655434334',
        'email'=>'iyad@gmail.com',
        'role_name'=>'Contracts Management',
        'password'=>bcrypt(' '),
           ]);

 $role=Role::where('name','Contracts Management')->first();
 $user->assignRole([$role->id]);



}
}
