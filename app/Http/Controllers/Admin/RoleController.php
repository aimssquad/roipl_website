<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\RoleMiddleware;

class RoleController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.roles.';
        // parent::__construct('Role');
    }

    public static function middleware(): array
    {
        return [
            'role_or_permission:admin|manager|hr',
            new Middleware('role:admin', only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\RoleMiddleware::using('Delete Role, manager'), except: ['destroy']),
            new Middleware(\Spatie\Permission\Middleware\RoleMiddleware::using('edit role,hr'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\RoleMiddleware::using('delete records,api'), only: ['destroy']),
        ];
    }

    public function index()
    {
        $datas = Role::all();
        return view($this->prefix.'index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view($this->prefix.'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required',
        ]);
        Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        return redirect()->route($this->prefix.'index')->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return view($this->prefix.'edit', compact('data'));
    }

    // Update the specified role in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'guard_name' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return redirect()->route($this->prefix.'index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        // Check if the role can be deleted (optional, based on business rules)
        if ($role->name == 'Admin') {
            return redirect()->route($this->prefix.'index')->with('error', 'Cannot delete the Admin role.');
        }
        $role->delete();
        return redirect()->route($this->prefix.'index')->with('success', 'Data deleted successfully.');
    }

    public function givePermission($roleId)
    {
        $permission = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermission = DB::table('role_has_permissions')
        ->where('role_has_permissions.role_id',$role->id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view($this->prefix.'add-permission', [
            'role' => $role,
            'permission' => $permission,
            'rolePermission' => $rolePermission,
        ]);
    }

    public function givePermissionRole(Request $request, $roleId){

        //dd($request->all());

        $request->validate([
            'permission' => 'required'
        ]);
          $role = Role::findOrFail($roleId);
          $role->syncPermissions($request->permission);
          return redirect()->route($this->prefix.'index')->with('success', 'Permission assigned successfully');
    }
}
