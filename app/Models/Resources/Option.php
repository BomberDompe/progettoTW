<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {

    protected $table = 'opzionamenti';
    protected $primaryKey = 'opzionamento_id';
    public $timestamps = false;

    public function getOfferId($user_id) {
        return $this->where('locatario_id', $user_id)->pluck('offerta_id')->toArray();
    }

    public function getLarioByOfferId($offer_id) {
        return $this->where('offerta_id', $offer_id)->pluck('locatario_id')->toArray();
    }

    public function getOfferByOption($option_id) {
        return $this->where('opzionamento_id', $option_id)->get('offerta_id');
    }

    public function getOptionById($option_id) {
        return $this->find($option_id);
    }

}
