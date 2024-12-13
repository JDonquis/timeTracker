<?php  

namespace App\Services;

use App\Models\Employee;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{	
    public function getEmployees()
    {
        $employees = Employee::search(trim(request('search')))
        ->query(function($query){
            $query->join('users', 'employees.user_id', '=', 'users.id')
              ->join('departments', 'employees.department_id', '=', 'departments.id')
              ->join('positions', 'employees.position_id', '=', 'positions.id')
              ->select('employees.*', 
                       'users.full_name', 
                       'users.DNI', 
                       'departments.name as department_name', 
                       'positions.name as position_name');
        })
        ->when(request('status'), function($query, $status){
            
            $statutes = ['Active' => 1, 'Deleted' => 2 ];
            $query->where('employees.status',$statutes[$status]);
        })
        ->unless(request('status'), function($query){
            $query->where('employees.status',1);

        })
        ->paginate();

        return $employees;

    }

    public function createEmployee($data)
    {

        $userService = new UserService;

        $newUser = $userService->createUser($data,'employee');

        $newEmployee = Employee::create([

            'user_id' => $newUser->id ,
            'department_id' => $data['department'] ,
            'position_id' => $data['position'] ,
            'full_name' => $data['full_name'] ,
            'address' => $data['address'] ,
            'phone_number' => $data['phone_number'] ,
            'email' => $data['email'] ,
            'status' => 1,
        ]);

        return $newEmployee;

    }

    public function updateEmployee($data, $employee)
    {

        $user = $employee->user;

        $userService = new UserService;
        $userService->updateUser($data,$user);

        $employee->update([
            
            'department_id' => $data['department'],
            'position_id' => $data['position'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
        ]);

        return 0;

    }

    public function deleteEmployee($employee){

        $employee->load('user');
        $employee->status = 2;
        $employee->user->status = 2;
        $employee->user->DNI = $this->findDNIWhenDelete($employee);
        
        
        
        $employee->save();
        $employee->user->save();
    }

    private function findDNIWhenDelete($employee)
    {
        $baseDNI = $employee->user->DNI;
        $counter = 1;
        $searchDNI = "$baseDNI-$counter";

        while (User::where('DNI', $searchDNI)->exists()) {
            $counter++;
            $searchDNI = "{$baseDNI}-{$counter}";
        }

        return $searchDNI;
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
