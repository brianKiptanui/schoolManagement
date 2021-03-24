<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RolesCollection;
use App\Http\Resources\RolesResources;
use App\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return new RolesCollection(Role::all());
        return RolesResources::collection(Role::all());
    }

    /**
     * Show the form for creating a new resource.
     *



     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        $listOfPermissions = explode(',', $request->roles_permissions);


        //Creating Permission
        foreach ($listOfPermissions  as $permissions){
            $permissions = new Permission();
            $permissions->name = $permissions;
            $permissions->save();

            $role->permissions()->attach($permissions->id);
            $role->save();
        }

        return response([
            'data' => new RolesResources($role)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return new RolesResources($role);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role = Role::findOrFail($role);
        $role->name = $request->name;
        $role->update();


        // Updating permission
        $listOfPermissions = explode(',', $request->roles_permissions);

        foreach ($listOfPermissions  as $permissions) {
            $permissions = new Permission();
            $permissions->name = $permissions;
            $permissions->save();

            $role->permissions()->attach($permissions->id);
            $role->update();
        }

        return response([
            'data' => new RolesResources($role)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role = Role::find($role);
        $role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();
        return response( null , Response::HTTP_NO_CONTENT);
    }
}
