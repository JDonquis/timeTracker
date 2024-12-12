<?php  

namespace App\Services;

use App\Models\TimeTracker;
use App\Models\TimeTrackerDetail;
use Carbon\Carbon;

class TimeTrackerService
{	
    public function getRegisters()
    {
        $registers = TimeTracker::search(request('search'))
        ->query(function($query){
            $query->join('employees', 'time_trackers.employee_id', '=', 'employees.id')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->join('departments', 'employees.department_id', '=', 'departments.id')
              ->join('positions', 'employees.position_id', '=', 'positions.id')
              ->select('time_trackers.*',
                        'users.id as user_id',
                        'users.DNI', 
                        'employees.id as employee_id',
                        'users.full_name', 
                       'departments.name as department_name', 
                       'positions.name as position_name');
        })
        ->paginate();

        return $registers;
    }

    public function create($data){

        $user = auth()->user();
        $user->load('employee');

        
        $this->validateIfRepeatDate($data, $user);



        $timeTrackerGeneral = TimeTracker::create([
            
            'employee_id' => $user->employee->id,
            'start' => $data['first_date'],
            'end' => $data['second_date'],
            'comment' => $data['comment'],
            
        ]);

        $this->createDetailRegisters($data,$timeTrackerGeneral);


        return 0;

    }

    public function update($data, $timeTrackerGeneral){

        $timeTrackerGeneral->load('timeTrackerDetails');
        $timeTrackerGeneral->timeTrackerDetails()->delete();

        $user = auth()->user();
        $user->load('employee');

        $this->validateIfRepeatDate($data, $user);

        $timeTrackerGeneral->update(['start' => $data['first_date'], 'end' => $data['second_date'], 'comment' => $data['comment']]);

        $this->createDetailRegisters($data,$timeTrackerGeneral);

        return 0;        
    }

    
    private function validateIfRepeatDate($data, $user) {
        $dates = [];
        foreach ($data['rows'] as $register) {
            $dates[] = Carbon::createFromFormat('d/m/Y', $register['date'])->format('Y-m-d'); 
        }

        $existingDates = TimeTrackerDetail::whereIn('date', $dates)
            ->where('employee_id', $user->employee->id)
            ->orderBy('date','desc')
            ->pluck('date'); 

        if ($existingDates->isNotEmpty()) {
                $formattedDates = $existingDates->map(function($date) {
                    return Carbon::parse($date)->format('d/m/Y'); // Cambia 'd/m/Y' al formato que desees
                });

            throw new \Exception('Ya existen registros para las siguientes fechas: ' . implode(", \n", array_unique( $formattedDates->toArray() ) ) );
        }
    }

    private function createDetailRegisters($data, $timeTrackerGeneral){
        $arrayDetailRegisters = [];
        $created = Carbon::now();
        foreach($data['rows'] as $register){
            foreach($register['hours'] as $typeHour){
                

                array_push($arrayDetailRegisters,[

                

                    'time_tracker_id' => $timeTrackerGeneral->id,
                    'employee_id' => $timeTrackerGeneral->employee_id,
                    'type_hour_id' => $typeHour['typeHourId'],
                    'date' =>  Carbon::createFromFormat('d/m/Y', $register['date'])->format('Y-m-d'),
                    'hours' => $typeHour['value'],
                    'created_at' => $created,
                    'updated_at' => $created,
                ]);
            }

        }

        TimeTrackerDetail::insert($arrayDetailRegisters);
        
        return 0;
    }

    


}
