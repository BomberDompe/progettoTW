<?php

namespace App\Http\Controllers;

use App\Models\OfferList;
use App\Models\Resources\Offer;
use Illuminate\Support\Facades\Auth;
use App\Models\Catalog;
use App\Http\Requests\Request;

class LocatoreController extends Controller {

    protected $catalogModel;
    protected $offerListModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->catalogModel = new Catalog;
        $this->offerListModel = new OfferList;
    }

    public function showOfferList() {

        return view('offerview')
                        ->with('offerList', $this->offerListModel->getOffersByUserId(Auth::id()))
                        ->with('idLarioList', $this->offerListModel->getUserByOffer(Auth::id()))
                        ->with('optionList', $this->offerListModel->getAllOption());
    }

    public function deleteOffer($offerId) {

        Offer::where('offerta_id', $offerId)->delete();
        return redirect()->action('LocatoreController@showOfferList');
    }

    public function insertOffer() {
        
    }

    public function updateOffer() {
        
    }

    public function getOffer() {
        
    }

}
