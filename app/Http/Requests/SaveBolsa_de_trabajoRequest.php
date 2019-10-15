<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEventoRequest extends FormRequest
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
            'nombre'         => 'required',
            'anho_de_graduacion' => 'required',
            'genero' => 'required',
            'anhos_de_experiencia' => 'required',
            'paquetes_informaticos' => 'required',
            'ingles' => 'required',
            'maestrias' => 'required',
            'postgrado' => 'required',
            'email'          => 'required',
            'telefono'       => 'required',
            'event_date'     => 'required',

        ];
    }
}
