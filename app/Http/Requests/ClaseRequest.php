<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaseRequest extends FormRequest
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
			'Nombre' => 'required|string',
			'ejercicios' => 'required|string',
			'capacidad' => 'required',
			'entrenador_id' => 'required',
			'hora' => 'required|string',
			'dia' => 'required|string',
        ];
    }
}
