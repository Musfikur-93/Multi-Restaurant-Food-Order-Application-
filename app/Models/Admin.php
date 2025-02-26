<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'admin';
    protected $guarded = [];
    protected $guard_name = 'admin';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    //// Get the Group Name Data from the Permission Table
    public static function getpermissionGroup(){

        $permissionGroup = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permissionGroup;

    } // End of getpermissionGroup

    public static function getPermissionByGroupName($group_name){

        $permissions = DB::table('permissions')
                        ->select('name','id')
                        ->where('group_name',$group_name)
                        ->get();

        return $permissions;

    } // End of getPermissionByGroupName


    public static function roleHasPermissions($role, $permissions){
        $hasPermission = true;

        foreach($permissions as $key => $permission){
            if(!$role->hasPermissionTo($permission->name)){
                $hasPermission = false;
            }
            return $hasPermission;

        } // End of foreach

    } // End of roleHasPermissions


}
