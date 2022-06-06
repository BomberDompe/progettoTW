<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewMessageRequest extends FormRequest {

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
            'titolo' => ['required', 'string', 'max:100'],
            'descrizione' => ['required','string', 'max:100'],
            'prezzo' => ['required', 'numeric', 'max:2000'],
            'immagine' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'citta' => ['required', 'string', 'max:30'],
            'via' => ['required', 'string', 'max:30'],
            'civico' => ['required', 'integer', 'min:1', 'max:999'],
            'disponibilita_inizio' => ['required', 'date_format:Y-m-d', 'after:yesterday'],
            'disponibilita_fine' => ['required', 'date_format:Y-m-d', 'after:disponibilita_inizio', 'before:2100-01-01'],
            'eta_max' => ['nullable', 'integer', 'min:0', 'max:999', 'gte:eta_min'],
            'eta_min' => ['nullable', 'integer', 'min:0', 'max:999'],
            'tipologia' => ['required', 'integer'],
            'sup_appartamento' => ['required_if:tipologia,==,0', 'numeric', 'min:0', 'max:999'],
            'sup_camera' => ['required_if:tipologia,==,1', 'numeric', 'min:0', 'max:999'],
            'num_camere' => ['required_if:tipologia,==,0', 'numeric', 'min:0', 'max:99'],
            'posti_tot' => ['required', 'numeric', 'min:0', 'max:99'],
            'posti_camera' => ['required_if:tipologia,==,1', 'numeric', 'min:0', 'max:99'],
        ];
    }
    
    /**
     * Override: response in formato JSON
    */
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}

