<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^07[7-9][0-9]{7}$/', 'unique:users,phone'],
            'gender' => ['required', 'in:male,female'],
            'age' => 'required|integer|min:18|max:100',
            'id_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|string|min:6|confirmed'
        ];
    }
}
