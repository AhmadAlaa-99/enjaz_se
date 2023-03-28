<?php

namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
class TenantsController extends Controller
{


    public function index()
    {
         $tenants=Tenant::where('status','actived')->with('user','units')->latest()->paginate(5);
         return view('Admin.Tenants.index',compact('tenants'));
    }
    public function payments()
    {
         return view('Admin.Tenants.payments');
    }
    public function archive()
    {
        $tenants=Tenant::where('status','archived')->with('user','units')->latest()->paginate(5);
        return view('Admin.Archives.tenants',compact('tenants'));
    }
}
