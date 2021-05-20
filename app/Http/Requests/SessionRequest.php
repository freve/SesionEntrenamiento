<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class SessionRequest extends FormRequest
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
            'microcycle_id' => ['required', 'numeric'],
            'session_type_id' => ['required', 'exists:session_types,id', 'numeric'],
            'name' => ['required', 'unique:sessions', 'string'],
            'info' => ['required', 'string'],
            'start_session' => ['required', 'date'],
            'end_session' => ['required', 'date', 'after_or_equal:start_session']
        ];
    }

    public function attributes()
    {
        return [
            'microcycle_id' => 'identificador del microciclo',
            'session_type_id' => 'tipo de sesión de entrenamiento',
            'name' => 'nombre de la sesión de entrenamiento',
            'info' => 'información o descripción de la sesión de entrenamiento',
            'start_session' => 'fecha de inicio de la sesión de entrenamiento',
            'end_session' => 'fecha de finalización de la sesión de entrenamiento'
        ];
    }
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
        // return $this->redirector->to($this->getRedirectUrl())
        //     ->withInput($this->except($this->dontFlash))
        //     ->withErrors($errors, $this->errorBag);
    }
}
