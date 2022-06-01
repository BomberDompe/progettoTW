<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model {

    protected $table = 'offerte';
    protected $primaryKey = 'offerta_id';
    public $timestamps = false;
    
    public function getAllOffers($elemEachPage = 0) {
        if ($elemEachPage > 0) {
            return $this->where('offerta_id', '>=', 0)->paginate($elemEachPage);
        } else {
            return $this->where('offerta_id', '>=', 0);
        }
    }
}

