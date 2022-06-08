<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class OfferRequest extends FormRequest {

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
            'descrizione' => ['required','string', 'max:2000'],
            'prezzo' => ['required', 'numeric', 'min:1', 'max:9999', 'regex:/^([0-9])+$/'],
            'immagine' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'citta' => ['required', 'string', 'max:30', 'regex:/^([A-Z])+([A-Za-z àèéìòù\(\)])+$/'],
            'via' => ['required', 'string', 'max:30', 'regex:/^([A-Za-z0-9 àèéìòù])+$/'], 
            'civico' => ['required', 'integer', 'min:1', 'max:999', 'regex:/^([0-9])+$/'],
            'disponibilita_inizio' => ['required', 'date_format:Y-m-d', 'after:yesterday'],
            'disponibilita_fine' => ['required', 'date_format:Y-m-d', 'after:disponibilita_inizio', 'before:2100-01-01'],
            'eta_min' => ['nullable', 'numeric', 'min:18', 'max:125'],
            'eta_max' => ['nullable', 'numeric', 'min:18', 'max:125', 'gte:eta_min'],
            'tipologia' => ['required'],
            'sup_appartamento' => ['required_if:tipologia,==,0', 'numeric', 'min:9', 'max:999', 'regex:/^([0-9])+$/'],
            'sup_camera' => ['required_if:tipologia,==,1', 'numeric', 'min:9', 'max:999', 'regex:/^([0-9])+$/'],
            'num_camere' => ['required_if:tipologia,==,0', 'numeric', 'min:1', 'max:99', 'regex:/^([0-9])+$/'],
            'posti_tot' => ['required', 'numeric', 'min:1', 'max:99', 'regex:/^([0-9])+$/'],
            'posti_camera' => ['required_if:tipologia,==,1', 'numeric', 'min:1', 'max:99', 'regex:/^([0-9])+$/'],
        ];
    }
    
    /**
     * Override: response in formato JSON
    */
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}

