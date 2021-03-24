<?php
namespace App\Traits;

use App\Role;
use App\Permission;

trait HasRolesAndPermissions
{

    // A user may have multiple roles.
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    // A user may have multiple permissions.
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    //  This is determine if the user has the given role.
    public function hasRole($roles) {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    // Determine if the user may perform the given permission.
    protected function hasPermissionTo($permission)
    {
        return $this->hasPermission($permission);
    }

    // Check if user has permission through its roles
    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
    
}
