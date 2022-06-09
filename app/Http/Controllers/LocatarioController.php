<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Conversation;
use App\Http\Requests\FilteringRequest;
use App\Models\OfferList;
use App\Models\Resources\Option;
use Illuminate\Support\Facades\Auth;

class LocatarioController extends Controller {

    protected $catalogModel;
    protected $offerListModel;
    protected $conversationModel;



    public function __construct() {
        $this->middleware('can:isLocatario');
        $this->catalogModel = new Catalog;
        $this->offerListModel = new OfferList;
        $this->conversationModel = new Conversation;
    }

    public function showFilteredCatalog(FilteringRequest $request) {
        return view('catalog')
                        ->with('catalog', $this->catalogModel->getByFilters($request->all()))
                        ->with('pagination', false);
    }

    public function showOptionedList() {
        return view('offerview')
                        ->with('offerList', $this->offerListModel->getOffersByOption(Auth::id()))
                        ->with('optionList', $this->offerListModel->getAllOptions());
    }

    public function deleteOption($offerId) {
        Option::where('offerta_id', $offerId)->where('locatario_id',Auth::id())->delete();
        return redirect()->action('LocatarioController@showOptionedList');

    }
    
    public function optionedOffer($offer_id){
        $this->offerListModel->insertOption($offer_id, Auth::id());
        $offer = $this->offerListModel->getOfferByIdOffer($offer_id);
        $this->conversationModel->createDefaultMessage($offer,Auth::id());
        return redirect()->action('PublicController@showDetails',$offer_id);             
    }
    
    public function showOptionButton($offer_id){
         return $this->offerListModel->getOptionByOfferLarioId($offer_id, Auth::id());
    }
    
    public function showButtons($offer_id) {
        return $this->offerListModel->verifyAssigned($offer_id);
    }
   

}
