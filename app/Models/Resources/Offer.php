<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model {

    protected $table = 'offerte';
    protected $primaryKey = 'offerta_id';
    protected $guarded = ['offerta_id'];
    public $timestamps = false;
    
    public function getAllOffers($elemEachPage = 0) {
        if ($elemEachPage > 0) {
            return $this->where('offerta_id', '>=', 0)->paginate($elemEachPage);
        } else {
            return $this->where('offerta_id', '>=', 0);
        }
    }
    
    public function getOfferById($offer_id){
        return $this->find($offer_id);
    }
    
    public function getOffersIdByLoreId($user_id){
                return $this->where('user_id', $user_id)->pluck('offerta_id')->toArray();
    }
    
    public function getLoreIdByOfferId($offer_id){
        return $this->where('offerta_id',$offer_id)->get();
    }
    
    public function getIdsByType($type){
        return $this->where('tipologia', $type)->pluck('offerta_id')->toArray();
    }
}

