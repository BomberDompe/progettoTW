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
    
    public function acceptOffer($opt_id) {
        
        $this->offerListModel->setAcceptById($opt_id);
        return redirect()->action('LocatoreController@showOfferList');
    }

    public function deleteOffer($offerId) {
        
        $autenticati = Offer::where('offerta_id', $offerId)->value('user_id');
        
        if ( Auth::id() == $autenticati){
         Offer::where('offerta_id', $offerId)->delete();
         return redirect()->action('LocatoreController@showOfferList');
        }
        return redirect()->action('UserController@index');
    }

    public function showInsertOfferForm() {
        return view('form/offerform');
    }
    
    public function showUpdateOfferForm() {
        return view('form/offerform');
    }
    
    public function insertOffer(OfferRequest $request) {
        
    }
    
    public function updateOffer(OfferRequest $request) {
        
    }

}
