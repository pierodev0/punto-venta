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
            'ruc' => ['required', 'string', 'max:11', 'unique:clients,ruc,'. $this->route('client')->id],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:9', 'unique:clients,phone,'. $this->route('client')->id],
            'email' => ['required', 'string', 'max:255', 'email:rfc,dns', 'unique:clients,email,'. $this->route('client')->id],
        ];
    }
}
