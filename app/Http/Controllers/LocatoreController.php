<?php

namespace App\Http\Controllers;

use App\Models\OfferList;
use Illuminate\Support\Facades\Auth;
use App\Models\Catalog;
use App\Http\Requests\OfferRequest;

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
                        ->with('optionList', $this->offerListModel->getAllOptions());
    }
    
    public function acceptOffer($optId) {
        
        $this->offerListModel->setAcceptedById($optId, Auth::id());
        return redirect()->action('LocatoreController@showOfferList');
    }

    public function deleteOffer($offerId) {
        
        return $this->offerListModel->deleteOffer($offerId, Auth::id());
    }

    public function showInsertOfferForm() {
        return view('form/offerform');
    }
    
    public function showUpdateOfferForm($offerId) {
        return view('form/offerform')
            ->with('offer', $this->offerListModel->getOfferForUpdate($offerId, Auth::id()));
    }
    
    public function insertOffer(OfferRequest $request) {
        return $this->offerListModel->insertOffer($request, Auth::id());
    }
    
    public function updateOffer(OfferRequest $request) {
         return $this->offerListModel->updateOffer($request);
    }

}
