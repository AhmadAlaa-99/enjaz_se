<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [
        'صلاحيات المستأجر',
    'الاحصائيات',
    'اضافة عقد استئجار',
    'حركة الاستئجار',
    'ادارة العقارات',
    'ادارة المستأجرين',
    'حركة التأجير',
    'طلبات الصيانة',
    'السجل المالي',
    'اعدادات الحساب',
    'اعدادات الادمن',

];

foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
$role_admin = Role::create(['name' => 'Admin']);
$role_admin_s = Role::create(['name' => 'Assistant_Admin']);
$role_tenant = Role::create(['name' => 'Tenant']);
$role_lease = Role::create(['name' => 'Leases Mangement']);
$role_contract = Role::create(['name' => 'Contracts Management']);

$role_admin->syncPermissions(
    'الاحصائيات',
    'اضافة عقد استئجار',
    'حركة الاستئجار',
    'ادارة العقارات',
    'ادارة المستأجرين',
    'حركة التأجير',
    'طلبات الصيانة',
    'السجل المالي',
    'اعدادات الادمن',);
    $role_admin_s->syncPermissions(
    'الاحصائيات',
    'اضافة عقد استئجار',
    'حركة الاستئجار',
    'ادارة العقارات',
    'ادارة المستأجرين',
    'حركة التأجير',
    'طلبات الصيانة',
    'السجل المالي',
    'اعدادات الادمن',);
$role_tenant->syncPermissions(
    'صلاحيات المستأجر',
        'اعدادات الحساب',

    );
$role_lease->syncPermissions(
    'ادارة العقارات',
    'ادارة المستأجرين',
    'حركة التأجير',
    'اعدادات الحساب',
);
$role_contract->syncPermissions(
    'اضافة عقد استئجار',
    'حركة الاستئجار',
    'اعدادات الحساب',
);



}}
