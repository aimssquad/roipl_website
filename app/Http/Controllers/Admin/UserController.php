<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.users.';
        // parent::__construct('Role');
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $datas = User::all();
        return view($this->prefix.'index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view($this->prefix.'create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);

        $user->syncRoles($request->roles);

        return redirect()->route($this->prefix.'index')->with('success','User created successfully with roles');
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
    public function edit(string $userId)
    {
        // Find the user by its ID (or throw 404 if not found)
        $user = User::findOrFail($userId);

        // Get all roles (pluck name => name)
        $roles = Role::pluck('name', 'name')->all();

        // Get the roles assigned to the user (pluck name => name)
        $userRoles = $user->roles->pluck('name', 'name')->all();

        // Return the edit view with the user, roles, and user's roles
        return view($this->prefix.'edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect()->route($this->prefix.'index')->with('success','User Updated Successfully with roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        if ($data->name == 'admin') {
            return redirect()->route($this->prefix.'index')->with('error', 'Cannot delete the admin.');
        }
        $data->delete();
        return redirect()->route($this->prefix.'index')->with('success', 'Data deleted successfully.');
    }
}
