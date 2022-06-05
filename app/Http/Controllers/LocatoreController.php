<?php

namespace App\Http\Controllers;

use App\Models\OfferList;
use App\Models\Resources\Offer;
use Illuminate\Support\Facades\Auth;

class LocatoreController extends Controller {

    protected $offerListModel;

    public function __construct() {
        //$this->middleware('can:isLocatore');
        $this->offerListModel = new OfferList;
    }

    public function showOfferList() {

        return view('offerview')
                        ->with('offerList', $this->offerListModel->getOffersByUserId(Auth::id()))
                        ->with('idLarioList', $this->offerListModel->getUserByOffer(Auth::id()))
                        ->with('optionList', $this->offerListModel->getAllOption());
    }
    
        public function deleteOffer($offerId) {
        
        Offer::where('offerta_id',$offerId)->delete();
        return redirect()->action('LocatoreController@showOfferList');
    }


}
