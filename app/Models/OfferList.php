<?php

namespace App\Models;

use App\Models\Resources\Offer;

class OfferList {
    
    protected $offerModel;
    
    public function __construct() {
        $this->offerModel = new Offer;
    }

      public function getOffersByUserId($username_id ){
          
          $listOffer = $this->offerModel->getAllOffers();
          return $listOffer->where('username_id', $username_id)->get();
        
    
}}

