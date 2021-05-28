<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MethodUpRequest extends FormRequest
{
    protected $id;

    public function __construct(Request $request)
    {
        $this->id = (int) $request->route('session');
    }
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
            'name' => ['required', Rule::unique('methods', 'name')->ignore($this->id), 'string'],
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
