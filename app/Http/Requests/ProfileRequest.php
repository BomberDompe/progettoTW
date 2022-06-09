<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => ['required', 'string', 'max:20', 'regex:/^([A-Z])+([A-Za-z àèéìòù])+$/'],
            'surname' => ['required', 'string', 'max:20', 'regex:/^([A-Z])+([A-Za-z àèéìòù])+$/'],
            'genere' => ['required', 'string'],
            'telefono' => ['nullable', 'string', 'min:10', 'max:15', 'regex:/^((00|\+)39[\. ]??)??3\d{2}[\. ]??\d{6,7}$/'],
            'comune_residenza' => ['nullable', 'string', 'max:25', 'regex:/^([A-Z])+([A-Za-z àèéìòù\(\)\'])+$/'],
            'data_nascita' => ['required', 'date_format:Y-m-d', 'after:1950-01-01', 'before:2010-01-01'],
        ];
    }

}
