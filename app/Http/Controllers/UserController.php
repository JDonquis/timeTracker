<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\LoginService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userService = new UserService();
        $users = $userService->getUsers(); 

        return view('dashboard.users')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        DB::beginTransaction();
        
        try {
        
            $userService = new UserService();
            $newUser = $userService->createUser($request->all());

            DB::commit();
            return redirect('dashboard/usuarios')->with(['success' => 'User created successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
        

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {   
        return view('dashboard.users.edit')->with(['user' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $usuario)
    {
        DB::beginTransaction();
        
        try {
        
            $userService = new UserService();
            $userService->updateUser($request->all(),$usuario);

            DB::commit();
            return redirect('dashboard/usuarios')->with(['success' => 'User updated successfully']);

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {   
        DB::beginTransaction();
        
        try {
            
            $userService = new UserService();
            $userService->deleteUser($usuario);

            DB::commit();

            return redirect('dashboard/usuarios')->with(['success' => 'User deleted successfully']);

        }catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }

    }

    public function login(LoginRequest $request){

        $loginService = new LoginService;
        $dataUser = ['DNI' => $request->DNI, 'password' => $request->password];

        if(!$loginService->tryLoginOrFail($dataUser))
                return redirect('/')->withErrors(['data' => 'Incorrect credentials']);

        return redirect()->intended('/dashboard')->with(['success' => 'You have successfully logged in!']);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }


    public function username()
    {
        return 'DNI';
    }

}
