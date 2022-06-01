<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilteringRequest extends FormRequest {

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
            'min_price' => ['nullable', 'numeric', 'min:0'],
            'max_price' => ['nullable', 'numeric', 'max:9999', 'gte:min_price'],
            'start_date' => ['nullable', 'date_format:Y-m-d', 'after:yesterday'],
            'end_date' => ['nullable', 'date_format:Y-m-d', 'after:start_date', 'before:2100-01-01'],
            'sup_appartamento' => ['nullable', 'numeric', 'min:0', 'max:999'],
            'sup_camera' => ['nullable', 'numeric', 'min:0', 'max:999'],
            'num_camere' => ['nullable', 'numeric', 'min:0', 'max:99'],
            'posti_tot' => ['nullable', 'numeric', 'min:0', 'max:99'],
            'posti_camera' => ['nullable', 'numeric', 'min:0', 'max:99'],
        ];
    }

}
