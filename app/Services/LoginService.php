<?php  

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService
{       
    public function tryLoginOrFail($dataUser){

        if(!Auth::attempt($dataUser))
                return false;
            
        return true;
    }


}
