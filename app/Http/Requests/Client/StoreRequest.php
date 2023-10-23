<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'dni' => ['required','string','min:8','max:8','unique:clients'],
            'ruc' => ['nullable','string','max:11','unique:clients'],
            'address' => ['nullable','string','max:255'],
            'phone' => ['nullable','string','max:9','unique:clients'],
            'email' => ['nullable','string','max:255','email:rfc,dns','unique:clients'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe exceder los 255 caracteres.',
            'dni.required' => 'El campo DNI es obligatorio.',
            'dni.string' => 'El campo DNI debe ser una cadena de texto.',
            'dni.min' => 'El campo DNI debe tener 8 caracteres.',
            'dni.max' => 'El campo DNI debe tener 8 caracteres.',
            'dni.unique' => 'Ya existe un cliente con este DNI.',
            'ruc.required' => 'El campo RUC es obligatorio.',
            'ruc.string' => 'El campo RUC debe ser una cadena de texto.',
            'ruc.max' => 'El campo RUC debe tener 11 caracteres.',
            'ruc.unique' => 'Ya existe un cliente con este RUC.',
            'address.required' => 'El campo dirección es obligatorio.',
            'address.string' => 'El campo dirección debe ser una cadena de texto.',
            'address.max' => 'El campo dirección no debe exceder los 255 caracteres.',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'phone.string' => 'El campo teléfono debe ser una cadena de texto.',
            'phone.max' => 'El campo teléfono debe tener 9 caracteres.',
            'phone.unique' => 'Ya existe un cliente con este número de teléfono.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.string' => 'El campo correo electrónico debe ser una cadena de texto.',
            'email.max' => 'El campo correo electrónico no debe exceder los 255 caracteres.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'Ya existe un cliente con este correo electrónico.',
        ];    
        
        
    }
}
