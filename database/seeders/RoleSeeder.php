<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $employee = Role::create(['name' => 'employee']);


        $readUserPermission = Permission::create(['name' => 'read-users']);
        $createUserPermission = Permission::create(['name' => 'create-users']);
        $updateUserPermission = Permission::create(['name' => 'update-users']);
        $deleteUserPermission = Permission::create(['name' => 'delete-users']);

        $readEmployeesPermission = Permission::create(['name' => 'read-employees']);
        $createEmployeesPermission = Permission::create(['name' => 'create-employees']);
        $updateEmployeesPermission = Permission::create(['name' => 'update-employees']);
        $deleteEmployeesPermission = Permission::create(['name' => 'delete-employees']);

        $readDepartmentsPermission = Permission::create(['name' => 'read-departments']);
        $createDepartmentsPermission = Permission::create(['name' => 'create-departments']);
        $updateDepartmentsPermission = Permission::create(['name' => 'update-departments']);
        $deleteDepartmentsPermission = Permission::create(['name' => 'delete-departments']);

        $readPositionsPermission = Permission::create(['name' => 'read-positions']);
        $createPositionsPermission = Permission::create(['name' => 'create-positions']);
        $updatePositionsPermission = Permission::create(['name' => 'update-positions']);
        $deletePositionsPermission = Permission::create(['name' => 'delete-positions']);

        // Type Hours Worked
        $readTypeHourWorkedPermission = Permission::create(['name' => 'read-type_hours']);
        $createTypeHourWorkedPermission = Permission::create(['name' => 'create-type_hours']);
        $updateTypeHourWorkedPermission = Permission::create(['name' => 'update-type_hours']);
        $deleteTypeHourWorkedPermission = Permission::create(['name' => 'delete-type_hours']);

        $readTimeTrackerPermission = Permission::create(['name' => 'read-time_tracker']);
        $createTimeTrackerPermission = Permission::create(['name' => 'create-time_tracker']);
        $updateTimeTrackerPermission = Permission::create(['name' => 'update-time_tracker']);
        $deleteTimeTrackerPermission = Permission::create(['name' => 'delete-time_tracker']);



        $adminPermissions = [

            $readUserPermission, $createUserPermission, $updateUserPermission, $deleteUserPermission,
            $readEmployeesPermission, $createEmployeesPermission, $updateEmployeesPermission, $deleteEmployeesPermission,
            $readDepartmentsPermission, $createDepartmentsPermission, $updateDepartmentsPermission, $deleteDepartmentsPermission,
            $readPositionsPermission, $createPositionsPermission, $updatePositionsPermission, $deletePositionsPermission,
            $readTimeTrackerPermission, 
            $readTypeHourWorkedPermission, $createTypeHourWorkedPermission, $updateTypeHourWorkedPermission, $deleteTypeHourWorkedPermission,
        
        ];

        // For now none
        $employeePermissions = [
            $readTimeTrackerPermission, $createTimeTrackerPermission, $updateTimeTrackerPermission, $deleteTimeTrackerPermission,
            
        ];

        $adminRole->syncPermissions($adminPermissions);
        $employee->syncPermissions($employeePermissions);

    }
}
