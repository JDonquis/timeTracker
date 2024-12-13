<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
        return [

            'photo' => ['sometimes','image','mimes:jpeg,png,jpg','max:2048'],
            'full_name' => ['required','string','max:255'],
            'DNI' => ['required','string','max:50','unique:users,DNI'],
            'phone_number' => ['required','string','max:255'],
            'email' => ['required','string','max:255','email'],
            'department' => ['required', 'integer', 'exists:departments,id'],
            'position' => ['required', 'integer', 'exists:positions,id'],

        ];
    }
}
