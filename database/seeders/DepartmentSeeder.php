<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(['name' => 'CEO']);
        Department::create(['name' => 'Human Resources (HR)']);
        Department::create(['name' => 'Finance']);
        Department::create(['name' => 'Logistics']);
        Department::create(['name' => 'Media & Marketing']);

    }
}
