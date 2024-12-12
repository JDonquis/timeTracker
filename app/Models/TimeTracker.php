<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class TimeTracker extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'employee_id',
        'start',
        'end',
        'comment',
    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',

    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function timeTrackerDetails(){
        return $this->hasMany(TimeTrackerDetail::class);
    }

    public function toSearchableArray(){   

        return [
            'employee.user.full_name' => '',
            'employee.user.DNI' => '',
            'employee.department.name' => '',
            'employee.position.name' => '',
            'employee.email' => '',
        ];

    }
}
