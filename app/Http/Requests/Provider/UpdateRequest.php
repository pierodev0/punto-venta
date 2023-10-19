<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'email', 'max:250', 'unique:providers'],
            'ruc_number' => ['required', 'string', 'max:11', 'min:11', 'unique:providers,ruc_number,' . $this->route('provider')->id],
            'address' => ['nullable', 'string', 'max:250','unique:providers,address,' . $this->route('provider')->id],
            'phone' => [
                'required', 'string', 'max:9', 'min:9',
                'unique:providers,phone,' . $this->route('provider')->id
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe exceder los 250 caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El campo correo electrónico no debe exceder los 250 caracteres.',
            'email.unique' => 'Ya existe un proveedor con este correo electrónico.',
            'ruc_number.required' => 'El campo número de RUC es obligatorio.',
            'ruc_number.string' => 'El campo número de RUC debe ser una cadena de texto.',
            'ruc_number.max' => 'El campo número de RUC debe tener 11 caracteres.',
            'ruc_number.min' => 'El campo número de RUC debe tener 11 caracteres.',
            'ruc_number.unique' => 'Ya existe un proveedor con este número de RUC.',
            'address.string' => 'El campo dirección debe ser una cadena de texto.',
            'address.max' => 'El campo dirección no debe exceder los 250 caracteres.',
            'address.unique' => 'Ya existe un proveedor con esta dirección.',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'phone.string' => 'El campo teléfono debe ser una cadena de texto.',
            'phone.max' => 'El campo teléfono debe tener 9 caracteres.',
            'phone.min' => 'El campo teléfono debe tener 9 caracteres.',
            'phone.unique' => 'Ya existe un proveedor con este número de teléfono.',
        ];
    }
}
