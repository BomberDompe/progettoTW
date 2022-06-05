<?php

namespace App\Models;

use App\Models\Resources\Offer;
use App\Models\Resources\Option;
use App\User;

class OfferList {

    protected $offerModel;

    public function __construct() {

        $this->offerModel = new Offer;
        $this->optionModel = new Option;
    }

    public function getOffersByUserId($user_id) {

        $listOffer = $this->offerModel->getAllOffers();
        return $listOffer->where('user_id', $user_id)->get();
    }

    public function getOffersByOption($user_id) {

        $options = $this->optionModel->getOfferId($user_id);
        $optOfferList = array();
        foreach ($options as $x) {
            $optOffer = $this->offerModel->getOfferById($x);
            array_push($optOfferList, $optOffer);
        }
        return $optOfferList;
    }

    public function getUserByOffer($user_id) {
        $offerIdList = $this->offerModel->getOffersIdByLoreId($user_id);
        $optLarioList = array();
        foreach ($offerIdList as $offerId) {
            $larioIdList = $this->optionModel->getLarioByOfferId($offerId);
            foreach ($larioIdList as $LarioId) {
                $larioOpt = User::find($LarioId);
                array_push($optLarioList, $larioOpt);
            }
        }
        $optLarioList = array_unique($optLarioList);

        return $optLarioList;
    }

    public function getAllOption() {
        return Option::all();
    }

}
