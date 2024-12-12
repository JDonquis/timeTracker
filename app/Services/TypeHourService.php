<?php  

namespace App\Services;

use App\Models\Department;
use App\Models\TypeHour;
use Exception;
use Illuminate\Support\Facades\Hash;

class TypeHourService
{	
    public function getTypeHours()
    {
        $typeHours = TypeHour::search(request('search'))
        ->paginate();

        return $typeHours;
    }

    public function createTypeHour($data){

        TypeHour::create([
            
            "name" => $data['name'],
            "type" => $data['type'],

        ]);

        return 0;

    }

    public function updateTypeHour($data, $typeHour){

        $typeHour->update([
            
            "name" => $data['name'],
            "type" => $data['type'],
        ]);

        return 0;

    }



}
