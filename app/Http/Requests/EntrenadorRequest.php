<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrenadorRequest extends FormRequest
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
			'NIF' => 'required|string',
			'Nombre' => 'required|string',
			'Apellidos' => 'required|string',
			'FechaNac' => 'required',
			'Sueldo' => 'required',
			'gimnasio_id' => 'required',
        ];
    }
}
