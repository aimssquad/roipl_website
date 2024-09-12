<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Group 0 Permissions (e.g., Dashboard)
        Permission::create([
            'name' => 'Dashboard',
            'guard_name' => 'web', // Default guard name
        ]);

        // Group 1 Permissions (Role Management)
        $group1Permissions = [
            ['name' => 'View Role', 'guard_name' => 'web'],
            ['name' => 'Add Role', 'guard_name' => 'web'],
            ['name' => 'Edit Role', 'guard_name' => 'web'],
            ['name' => 'Delete Role', 'guard_name' => 'web'],
        ];

        foreach ($group1Permissions as $permission) {
            Permission::create($permission);
        }

        // Group 2 Permissions (About)
        $group2Permissions = [
            ['name' => 'View About', 'guard_name' => 'web'],
            ['name' => 'Add About', 'guard_name' => 'web'],
            ['name' => 'Edit About', 'guard_name' => 'web'],
            ['name' => 'Delete About', 'guard_name' => 'web'],
        ];

        foreach ($group2Permissions as $permission) {
            Permission::create($permission);
        }

        // Group 3 Permissions (Brand Management)
        $group3Permissions = [
            ['name' => 'View Brand', 'guard_name' => 'web'],
            ['name' => 'Add Brand', 'guard_name' => 'web'],
            ['name' => 'Edit Brand', 'guard_name' => 'web'],
            ['name' => 'Delete Brand', 'guard_name' => 'web'],
        ];

        foreach ($group3Permissions as $permission) {
            Permission::create($permission);
        }

        // Group 4 Permissions (Event Management)
        $group4Permissions = [
            ['name' => 'View Event', 'guard_name' => 'web'],
            ['name' => 'Add Event', 'guard_name' => 'web'],
            ['name' => 'Edit Event', 'guard_name' => 'web'],
            ['name' => 'Delete Event', 'guard_name' => 'web'],
        ];

        foreach ($group4Permissions as $permission) {
            Permission::create($permission);
        }

        // Group 5 Permissions (User Management)
        $group5Permissions = [
            ['name' => 'View User', 'guard_name' => 'web'],
            ['name' => 'Add User', 'guard_name' => 'web'],
            ['name' => 'Edit User', 'guard_name' => 'web'],
            ['name' => 'Delete User', 'guard_name' => 'web'],
        ];

        foreach ($group5Permissions as $permission) {
            Permission::create($permission);
        }

        // Group 6 Permissions (Permissions Management)
        $group6Permissions = [
            ['name' => 'View Permissions', 'guard_name' => 'web'],
            ['name' => 'Add Permissions', 'guard_name' => 'web'],
            ['name' => 'Edit Permissions', 'guard_name' => 'web'],
            ['name' => 'Delete Permissions', 'guard_name' => 'web'],
        ];

        foreach ($group6Permissions as $permission) {
            Permission::create($permission);
        }
    }
}
