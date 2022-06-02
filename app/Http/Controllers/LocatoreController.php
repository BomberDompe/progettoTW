<?php

namespace App\Http\Controllers;

use App\Models\OfferList;
use Illuminate\Support\Facades\Auth;

class LocatoreController extends Controller {
    
    protected $offerListModel;
  

    public function __construct() {
        //$this->middleware('can:isLocatore');
        $this->offerListModel = new OfferList;
    }
    
    public function showOfferList() {
         $this->userId = Auth::user()->username;
         print( $this->userId);
        
        return view('offerview')
                ->with('offerList', $this->offerListModel->getOffersByUserId( $this->userId));
    }
        
}

   

