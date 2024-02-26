<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FunkoRequest extends FormRequest
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
            'nombre' =>['required', 'string', 'max:50', Rule::unique('funkos', 'nombre')->ignore($this->funko, 'id')],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'numeric'],
            'cantidad' => ['required', 'numeric'],
            'categoria_id' => ['required', 'exists:categorias,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser una cadena de texto',
            'nombre.max' => 'El nombre no debe exceder los 50 caracteres',
            'nombre.unique' => 'El nombre ya existe',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.string' => 'La descripción debe ser una cadena de texto',
            'descripcion.max' => 'La descripción no debe exceder los 255 caracteres',
            'precio.required' => 'El precio es requerido',
            'precio.numeric' => 'El precio debe ser un número',
            'cantidad.required' => 'La cantidad es requerida',
            'cantidad.numeric' => 'La cantidad debe ser un número',
        ];
    }
}
