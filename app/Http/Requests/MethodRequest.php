<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class MethodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:methods', 'string'],
            'info' => ['required', 'string'],
            'intensity' => ['required', 'numeric', 'min:0'],
            'duration' => ['required', 'numeric', 'min:0'],
            'charge' => ['required', 'numeric', 'min:0'],
            'is_private' => ['required', 'boolean']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre de método de entrenamiento',
            'info' => 'información o descripción de método de entrenamiento',
            'intensity' => 'Intensidad de Entrenamiento',
            'duration' => 'Duración del método de entrenamiento, en minutos.',
            'charge' => 'Carga del método de entrenamiento',
            'is_private' => 'Privatización del método de entrenamiento'
        ];
    }
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
    }
}
