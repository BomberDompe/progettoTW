<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatsRequest extends FormRequest {

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
            'inizio' => ['nullable', 'date_format:Y-m-d', 'after:2022-01-01', 'before:2100-01-01'],
            'fine' => ['nullable', 'date_format:Y-m-d', 'after:2022-01-01', 'before:2100-01-01'],
        ];
    }

}
