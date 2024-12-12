<?php  

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserService
{	
    public function getUsers()
    {
        $users = User::search(request('search'))
        ->when(request('status'), function($query, $status){
            
            $statutes = ['Active' => 1, 'Deleted' => 2 ];
            $query->where('status',$statutes[$status]);
        })
        ->unless(request('status'), function($query){
            $query->where('status',1);

        })
        ->paginate();

        return $users;
    }

    public function createUser($data, $rol = 'admin')
    {

        $newUser = User::create([
            
            "full_name" => $data['full_name'],
            "DNI" => $data['DNI'],
            "password" => Hash::make($data['DNI']),
            "photo" => 'default.png',
            'status' => 1,
        ]);


        if (request()->hasFile('photo')) {
            $imageName = $this->handleUploadImage($data);
            $newUser->photo = $imageName;
            $newUser->save();
        }


        $newUser->assignRole($rol);

        return $newUser;

    }

    public function updateUser($data, $user)
    {

        $user->update([
            
            "full_name" => $data['full_name'],
            "DNI" => $data['DNI'],
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
    
    private function handleUploadImage($data){
        
        $file = request()->file('photo');
        $imageName = $data['DNI']. '_profile_image.' . $file->getClientOriginalExtension();
        $file->storeAs('users', $imageName, 'public');
        return $imageName;

    }

}
