<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() // Verifica si esa petición está autorizada para el usuario que la está realizando, por defecto es falso
    {
        // ? Vamos a autorizar todos los usuarios, por defecto está en falso
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() // Esto reemplazaría las reglas de validación
    {
        // ? Acá incluyo las reglas de validación
        // ? Podemos también diferenciar si estamos actualizando o creando por el método
        if ($this->isMethod('PATCH')){
            return [
                'title' => ['min:8']
            ];
        }
        return [
            'title' => 'required|min:4',
            'body' => 'required'
        ];
    }
}
