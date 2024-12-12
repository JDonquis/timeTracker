<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTrackerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_tracker_id',
        'employee_id',
        'type_hour_id',
        'date',
        'hours',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function timeTracker(){
        return $this->belongsTo(TimeTracker::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function typeHour(){
        return $this->belongsTo(TypeHour::class);
    }
}
