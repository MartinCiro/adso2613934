<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

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
        if ($this->method() == 'PUT') {
            return [
                'document' => ['required', 'numeric', 'unique:'.User::class, $this->id],
                'fullname' => ['required', 'string'],
                'gender' => ['required'],
                'birthdate' => ['required', 'date'],
                'phone' => ['required'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:'.User::class, $this->id]                
            ];
        }else {
            return [
                    'document' => ['required', 'numeric', 'unique:'.User::class],
                    'fullname' => ['required', 'string'],
                    'gender' => ['required'],
                    'birthdate' => ['required', 'date'],
                    'photo' => ['required', 'image'],
                    'phone' => ['required'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'unique:'.User::class],
                    'password' => ['required', 'confirmed']            
            ];
        }
        
    }
    public function messages(): array
    {
        return [
            'document.required' => 'El campo de documento es obligatorio',
            'document.numeric' => 'El campo de documento debe ser un número',
            'document.unique' => 'El campo de documento ya existe',
            'fullname.required' => 'El campo de nombre completo es obligatorio',
            'fullname.string' => 'El campo de nombre completo debe ser un texto',
            'fullname.max' => 'El campo de nombre completo no debe ser mayor a 64 caracteres',
            'gender.required' => 'El campo de genero es obligatorio',
            'birthdate.required' => 'El campo de fecha de nacimiento es obligatorio',
            'birthdate.date' => 'El campo de fecha de nacimiento debe ser una fecha',
            'photo.required' => 'El campo de imagen es obligatorio',
            'photo.image' => 'El campo de imagen debe ser una imagen',
            'phone.required' => 'El campo de teléfono es obligatorio',
            'email.required' => 'El campo de correo electrónico es obligatorio',
            'email.lowercase' => 'El campo de correo electrónico debe ser en minúsculas',
            'email.email' => 'El campo de correo electrónico debe ser un correo electrónico',
            'email.unique' => 'El campo de correo electrónico ya existe',
            'password.required' => 'El campo de contraseña es obligatorio',
            'password.confirmed' => 'El campo de confirmar contraseña no coincide',
        ];
    }

    public function attributes(): array
    {
        return [
            'document' => 'documento',
            'fullname' => 'nombre completo',
            'gender' => 'genero',
            'birthdate' => 'fecha de nacimiento',
            'photo' => 'imagen',
            'phone' => 'teléfono',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
        ];
    }

}
