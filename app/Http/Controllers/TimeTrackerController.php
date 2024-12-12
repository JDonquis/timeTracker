<?php

namespace App\Http\Controllers;

use App\Models\TimeTracker;
use App\Models\TypeHour;
use App\Services\TimeTrackerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $timeTrackerService = new TimeTrackerService();
        $registers = $timeTrackerService->getRegisters(); 
        
        return view('dashboard.time_tracker')->with(['registers' => $registers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allTypeHours = TypeHour::all();
        return view('dashboard.time_trackers.create')->with(['typeHours' => $allTypeHours]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        DB::beginTransaction();
        
        try {
        $timeTrackerService = new TimeTrackerService();
        $timeTrackerService->create($request->all());
        DB::commit();
        return redirect()->route('time_tracker.index')->with(['success' => 'Register created successfully']);

        } catch (\Throwable $th) {
        
            DB::rollBack();
            session()->flash('formData', $request->input('rows'));
            session()->flash('comment', $request->input('comment')); 
            session()->flash('first_date', $request->input('first_date')); 
            session()->flash('second_date', $request->input('second_date')); 
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);

        }
    
    }

 

     public function edit(TimeTracker $timeTracker)
    {   
        $allTypeHours = TypeHour::all();
        $timeTracker->load('employee','timeTrackerDetails');
        

        return view('dashboard.time_trackers.edit')->with(['typeHours' => $allTypeHours, 'timeTracker' => $timeTracker]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimeTracker $timeTracker)
    {   
        DB::beginTransaction();
        
        try {
            $timeTrackerService = new TimeTrackerService();
            $timeTrackerService->update($request->all(),$timeTracker);
            DB::commit();
            return redirect()->route('time_tracker.index')->with(['success' => 'Register update successfully']);

        } catch (\Throwable $th) {
        
            DB::rollBack();
            session()->flash('formData', $request->input('rows'));
            session()->flash('comment', $request->input('comment')); 
            session()->flash('first_date', $request->input('first_date')); 
            session()->flash('second_date', $request->input('second_date')); 
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeTracker $timeTracker)
    {
        DB::beginTransaction();
        
        try {
            
            $timeTracker->load('timeTrackerDetails');
            $timeTracker->timeTrackerDetails()->delete();
            $timeTracker->delete();

            DB::commit();
            return redirect()->route('time_tracker.index')->with(['success' => 'Register delete successfully']);

        } catch (\Throwable $th) {
        
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);

        }
    }
}
