<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['department_name' => 'COO'],
            ['department_name' => 'CFO'],
            ['department_name' => 'CIO'],
            ['department_name' => 'CEO'],
            ['department_name' => 'Vice-President'],
            ['department_name' => 'General Manager'],
            ['department_name' => 'Regional Manager'],
            ['department_name' => 'Territory Manager'],
            ['department_name' => 'Senior Manager'],
            ['department_name' => 'Manager'],
            ['department_name' => 'Area Manager'],
            ['department_name' => 'Cluster Manager'],
            ['department_name' => 'Designer'],
            ['department_name' => 'Senior Executive'],
            ['department_name' => 'Executive'],
            ['department_name' => 'Software Developer'],
            ['department_name' => 'Counter Sales Associate'],
        ]);
    }
}
