<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

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


    public function EditPermission($id){

        $permission = Permission::find($id);
        return view('admin.backend.pages.permission.edit_permission',compact('permission'));

    } // End of EditPermission


    public function UpdatePermission(Request $request){

        $per_id = $request->id;

        Permission::find($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);

    } // End of UpdatePermission


    public function DeletePermission($id){

        Permission::find($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End of DeletePermission


    public function ImportPermission(){

        return view('admin.backend.pages.permission.import_permission');

    } // End of ImportPermission


    public function Export(){

        return Excel::download(new PermissionExport, 'permission.xlsx');

    } // End of Export


    public function Import(Request $request){

        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    } // End of Import


    /////////////////////////////// Role Section ///////////////////////////////

    public function AllRoles(){

        $roles = Role::all();
        return view('admin.backend.pages.role.all_roles', compact('roles'));

    } // End of AllRoles


    public function AddRoles(){

        return view('admin.backend.pages.role.add_roles');

    } // End of AddPermission


    public function StoreRoles(Request $request){

        Role::create([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);

        $notification = array(
            'message' => 'Roles Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);

    } // End of StorePermission


    public function EditRoles($id){

        $roles = Role::find($id);
        return view('admin.backend.pages.role.edit_role',compact('roles'));

    } // End of EditPermission


    public function UpdateRoles(Request $request){

        $role_id = $request->id;

        Role::find($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);

    } // End of UpdateRoles


    public function DeleteRoles($id){

        Role::find($id)->delete();

        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End of DeletePermission


    ////////////////////////////// Add Role Permission All Method //////////////////////////////

    public function AddRolesPermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permissionGroup = Admin::getpermissionGroup();

        return view('admin.backend.pages.rolesetup.add_roles_permission', compact('roles', 'permissions', 'permissionGroup'));

    } // End of AddRolesPermission


    public function RolesPermissionStore(Request $request){

        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);

        } // End of foreach

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);

    } // End of RolesPermissionStore


    public function AllRolesPermission(){

        $roles = Role::all();
        return view('admin.backend.pages.rolesetup.all_roles_permission', compact('roles'));

    } // End of AllRolesPermission


    public function AdminEditRoles($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        $permissionGroup = Admin::getpermissionGroup();

        return view('admin.backend.pages.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permissionGroup'));

    } // End of AddRolesPermission





} // End of RoleController
