<?php  

namespace App\Services;

use App\Models\Position;
use Exception;
use Illuminate\Support\Facades\Hash;

class PositionService
{	
    public function getPositions()
    {
        $positions = Position::search(request('search'))
        ->paginate();

        return $positions;
    }

    public function createPosition($data){

        Position::create([
            
            "name" => $data['name'],
        ]);

        return 0;

    }

    public function updatePosition($data, $position){

        $position->update([
            
            "name" => $data['name'],
        ]);

        return 0;

    }

    // public function deleteUser($usuario)
    // {   
    //     $authUserId = auth()->id();
    //     $usuario->id == $authUserId ? throw new Exception("No puedes eliminar tu propio usuario", 401) : null;

    //     $usuario->specialties()->detach();
    //     $usuario->roles()->detach();

    //     $usuario->delete();

    //     return 0;
    // }

    // public function changePassword($data){
    //     $user = auth()->user();

    //     if (!Hash::check($data['currentPassword'], $user->password))
    //         throw new Exception("La contraseña actual es incorrecta", 403);

    //     if ($data['newPassword'] != $data['confirmPassword'])
    //         throw new Exception("La nueva contraseña no coincide con la confirmación", 403);

    //     $user->password = Hash::make($data['newPassword']);
    //     $user->save();

    //     return 0;
        
    // }

    // private function assignSpecialties($user, $data)
    // {

    //     if(!isset($data['specialties_ids']) || count($data['specialties_ids']) == 0 )
    //         throw new Exception("El doctor debe tener alguna especialidad seleccionada", 401);
        
    //     $user->specialties()->sync($data['specialties_ids']);

    //     return 0;
            
    // }
    
    // private function generateSearch($data)
    // {
    //     $search = $data['ci'] . " "
    //              .$data['name'] . " "
    //              .$data['last_name'] . " "
    //              .$data['email'] . " "
    //              .$data['phone_number'] . " ";
        
    //     return $search;
    // }
    

}
