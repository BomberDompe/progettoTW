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
    
    public function setAcceptById($opt_id) {
        $x = Option::find($opt_id);
        $x->data_assegnamento = date('Y-m-d');
        $x->save();
    }
    
    public function deleteOffer($offerId, $authId) {
        
        $autenticati = Offer::where('offerta_id', $offerId)->value('user_id');
        
        if ($authId == $autenticati){
            Offer::where('offerta_id', $offerId)->delete();
            return redirect()->action('LocatoreController@showOfferList');
        }
        return redirect()->action('UserController@index');
    }
    
    public function insertOffer($data, $userId) {
        if ($data->hasFile('immagine')) {
            $image = $data->file('immagine');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/images/offers';
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = null;
        }
        
        $this->offerModel->fill($data->validated());
        $this->offerModel->immagine = $imageName;
        $this->offerModel->user_id = $userId;
        
        $this->offerModel->climatizzazione = isset($data["climatizzazione"]);
        $this->offerModel->parcheggi = isset($data["parcheggi"]);
        $this->offerModel->farmacia = isset($data["farmacia"]);
        $this->offerModel->supermercato = isset($data["supermercato"]);
        $this->offerModel->ristorazione = isset($data["ristorazione"]);
        $this->offerModel->trasporti = isset($data["trasporti"]);
        $this->offerModel->opzionabilita = isset($data["opzionabilita"]);
        
        if ($data["tipologia"] === '0') {
            $this->offerModel->tipologia = 0;
            $this->offerModel->cucina = isset($data["cucina"]);
            $this->offerModel->locale_ricreativo = isset($data["locale_ricreativo"]);
            
        } elseif ($data["tipologia"] === '1') {
            $this->offerModel->tipologia = 1;
            $this->offerModel->angolo_studio = isset($data["angolo_studio"]);
        }
        
        if ($data["genere_locatario"] === '0') {
            $this->offerModel->genere_locatario = 0;
            
        } elseif ($data["genere_locatario"] === '1') {
            $this->offerModel->genere_locatario = 1;
        }
        
        $this->offerModel->data_inserimento = date('Y-m-d');
        $this->offerModel->save();

        return response()->json(['redirect' => route('offerview')]);
    }
    
    public function updateOffer($data, $userId) {
        
    }
}