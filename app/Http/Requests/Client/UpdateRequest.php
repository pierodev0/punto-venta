<?php

namespace App\Http\Requests\Client;

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
            'name' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'min:8', 'max:8', 'unique:clients,dni,'. $this->route('client')->id],
            'ruc' => ['nullable', 'string', 'max:11', 'unique:clients,ruc,'. $this->route('client')->id],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:9', 'unique:clients,phone,'. $this->route('client')->id],
            'email' => ['nullable', 'string', 'max:255', 'email:rfc,dns', 'unique:clients,email,'. $this->route('client')->id],
        ];
    }
}
