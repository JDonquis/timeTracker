<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Employee extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'user_id',
        'department_id',
        'position_id',
        'address',
        'phone_number',
        'email',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function toSearchableArray(){   

        return [
            'user.full_name' => '',
            'user.DNI' => '',
            'department.name' => '',
            'position.name' => '',
            'address' => '',
            'phone_number' => '',
            'email' => '',
        ];

    }
}
