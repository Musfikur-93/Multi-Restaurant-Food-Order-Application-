<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission(){

        $permissions = Permission::all();
        return view('admin.backend.pages.permission.all_permission', compact('permissions'));

    } // End of AllPermission

    public function AddPermission(){

        return view('admin.backend.pages.permission.add_permission');

    } // End of AddPermission

    public function StorePermission(Request $request){

        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'guard_name' => 'admin',
        ]);

        $notification = array(
            'message' => 'Permission Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);

    } // End of StorePermission




} // End of RoleController
