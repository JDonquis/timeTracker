<?php

namespace App\Http\Requests;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
        $employeeId = $this->route('employee');
        $employee = Employee::with('user')->find($employeeId)[0];
        $userId = $employee ? $employee->user->id : null;

        return [
            'full_name' => ['required','string','max:255'],
            'DNI' => ['required','string','max:50',Rule::unique(User::class)->ignore($userId)],
            'department' => ['required'],
            'position' => ['required'],
            'address' => ['required','string'],
            'phone_number' => ['required','string'],
            'email' => ['required','email'],
        ];
    }
}
