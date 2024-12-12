<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departmentService = new DepartmentService();
        $departments = $departmentService->getDepartments(); 

        return view('dashboard.departments')->with(['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.departments.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        DB::beginTransaction();
        
        try {
        
            $departmentService = new DepartmentService();
            $departmentService->createDepartment($request->all());

            DB::commit();
            return redirect('dashboard/departments')->with(['success' => 'Department created successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('dashboard.departments.edit')->with(['department' => $department]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department){
        
        DB::beginTransaction();
        
        try {
        
            $departmentService = new DepartmentService();
            $departmentService->updateDepartment($request->all(),$department);

            DB::commit();
            return redirect('dashboard/departments')->with(['success' => 'Department updated successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        DB::beginTransaction();
        
        try {
        
            $department->delete();

            DB::commit();

            return redirect('dashboard/departments')->with(['success' => 'Department deleted successfully']);
            
        }catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
