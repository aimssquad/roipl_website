<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{

    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.permissions.';
        // parent::__construct('Role');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Permission::all();
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
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required',
        ]);
        Permission::create([
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
    public function edit(string $id)
    {
        $data = Permission::findOrFail($id);
        return view($this->prefix.'edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'guard_name' => 'required',
        ]);

        $role = Permission::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return redirect()->route($this->prefix.'index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Permission::findOrFail($id);

        // Check if the role can be deleted (optional, based on business rules)
        if ($data->name == 'Dashboard') {
            return redirect()->route($this->prefix.'index')->with('error', 'Cannot delete the dashboard.');
        }
        $data->delete();
        return redirect()->route($this->prefix.'index')->with('success', 'Data deleted successfully.');
    }
}
