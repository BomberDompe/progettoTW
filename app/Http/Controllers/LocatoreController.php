<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Http\Requests\Request;

class LocatoreController extends Controller {
    
    protected $catalogModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
         $this->catalogModel = new Catalog;
    }

    public function insertOffer() {
        
    }
    
    public function updateOffer() {
        
    }
    
    public function getOffer() {
        
    }

}
