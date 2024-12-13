<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employeeService = new EmployeeService();
        $employees = $employeeService->getEmployees(); 

        return view('dashboard.employees')->with(['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $departments = Department::get();
        $positions = Position::get();

        return view('dashboard.employees.create')->with(['departments' => $departments, 'positions' => $positions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        DB::beginTransaction();

        
        try {
        
            $employeeService = new EmployeeService();
            $employeeService->createEmployee($request->all());

            DB::commit();
            return redirect('dashboard/employees')->with(['success' => 'Employee created successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
        

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {   
        $employee->load('user','department','position');
        $positions = Position::get();
        $departments = Department::get();

        return view('dashboard.employees.edit')->with(['employee' => $employee,'positions' => $positions, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        DB::beginTransaction();
        
        try {
        
            $employeeService = new EmployeeService();
            $employeeService->updateEmployee($request->all(),$employee);

            DB::commit();
            return redirect('dashboard/employees')->with(['success' => 'Employee updated successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {   
        DB::beginTransaction();
        
        try {
            
            $employeeService = new EmployeeService();
            $employeeService->deleteEmployee($employee);

            DB::commit();

            return redirect('dashboard/employees')->with(['success' => 'Employee deleted successfully']);

        }catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }

    }

}
