<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use App\Services\PositionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positionService = new PositionService();
        $positions = $positionService->getPositions(); 

        return view('dashboard.positions')->with(['positions' => $positions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PositionRequest $request)
    {
        DB::beginTransaction();
        
        try {
        
            $departmentService = new PositionService();
            $departmentService->createPosition($request->all());

            DB::commit();
            return redirect('dashboard/positions')->with(['success' => 'Position created successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        return view('dashboard.positions.edit')->with(['position' => $position]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PositionRequest $request, Position $position)
    {
        DB::beginTransaction();
        
        try {
        
            $departmentService = new PositionService();
            $departmentService->updatePosition($request->all(),$position);

            DB::commit();
            return redirect('dashboard/positions')->with(['success' => 'Position updated successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        DB::beginTransaction();
        
        try {
        
            $position->delete();

            DB::commit();

            return redirect('dashboard/positions')->with(['success' => 'Position deleted successfully']);
            
        }catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
