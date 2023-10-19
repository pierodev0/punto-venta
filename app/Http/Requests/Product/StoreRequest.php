<?php

namespace App\Http\Requests\Product;

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
            'name' => ['required','string','unique:products','max:255'],
            'image' => ['required','dimensions:min_width=100','min_height=200'],
            'sell_price' => ['required'],
            'category_id' => ['required','integer','exists:App\Models\Category,id'],
            'provider_id' => ['required','integer','exists:App\Models\Provider,id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.unique' => 'Ya existe un producto con este nombre.',
            'name.max' => 'El campo nombre no debe exceder los 255 caracteres.',
            'image.required' => 'La imagen es obligatoria.',
            'image.dimensions' => 'La imagen debe tener al menos 100 píxeles de ancho y 200 píxeles de alto.',
            'sell_price.required' => 'El precio de venta es obligatorio.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.integer' => 'La categoría debe ser un número entero.',
            'category_id.exists' => 'La categoría seleccionada no existe.',
            'provider_id.required' => 'El proveedor es obligatorio.',
            'provider_id.integer' => 'El proveedor debe ser un número entero.',
            'provider_id.exists' => 'El proveedor seleccionado no existe.',
        ];
    }
}
