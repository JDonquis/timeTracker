<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeHourRequest;
use App\Models\TypeHour;
use App\Services\TypeHourService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeHourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeHourService = new TypeHourService();
        $typeHours = $typeHourService->getTypeHours();

        return view('dashboard.type_hours')->with(['type_hours' => $typeHours]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.type_hours.create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeHourRequest $request)
    {
        DB::beginTransaction();
        
        try {
        
            $typeHourService = new TypeHourService();
            $typeHourService->createTypeHour($request->all());

            DB::commit();
            return redirect('dashboard/type-hours')->with(['success' => 'Type of hour created successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeHour $typeHour)
    {
        return view('dashboard.type_hours.edit')->with(['type_hour' => $typeHour]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeHourRequest $request, TypeHour $typeHour)
    {
        DB::beginTransaction();
        
        try {
        
            $typeHourService = new TypeHourService();
            $typeHourService->updateTypeHour($request->all(),$typeHour);

            DB::commit();
            return redirect('dashboard/type-hours')->with(['success' => 'Type of hour updated successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeHour $typeHour)
    {
        DB::beginTransaction();
        
        try {
        
            $typeHour->delete();

            DB::commit();

            return redirect('dashboard/type-hours')->with(['success' => 'Type of hour deleted successfully']);
            
        }catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
