<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if ($this->method() === 'PUT') {
            return [
                'name' => 'required|string'.$this->id,
                'manufacturer' => 'required|string',
                'releasedate' => 'required|date',
                'description' => 'required|string',

            ];
        } else {
            return [
                'name' => ['required', 'string', 'unique:'.Category::class],
                'image' => ['required', 'image'],
                'manufacturer' => ['required', 'string'],
                'releasedate' => ['required', 'date'],
                'description' => ['required', 'string']
            ];
        }
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'El campo de nombre es obligatorio',
            'name.unique' => 'El campo de nombre ya existe',
            'manufacturer.required' => 'El campo de manufacturer es obligatorio',
            'manufacturer.unique' => 'El campo de manufacturer ya existe'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre categoria',
            'manufacturer' => 'nombre creador'
        ];
    }

}
