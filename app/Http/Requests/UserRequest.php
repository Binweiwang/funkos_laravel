<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            //
            'name'=>['required','max:50',Rule::unique('users','name')->ignore($this->user, 'id')],
            'email'=>['required','email','max:50',Rule::unique('users','email')->ignore($this->user, 'id')],
            'password'=>['required','min:8'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'username es requerido',
            'name.max' => 'username no puede ser mayor a 50 caracteres',
            'name.unique' => 'username ya existe',
            'email.required' => 'email es requerido',
            'email.email' => 'email no es valido',
            'email.max' => 'email no puede ser mayor a 50 caracteres',
            'email.unique' => 'email ya existe',
            'password.required' => 'password es requerido',
            'password.min' => 'password no puede ser menor a 8 caracteres',

        ];
    }
}
