<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use App\Models\Resources\Offer;

class PublicController extends Controller {

    protected $offerModel;
    protected $faqModel;
    
    public function __construct() {
        $this->offerModel = new Offer;
        $this->faqModel = new Faq;
    }
    
    public function showCatalog() {
        return view('catalog')
        ->with('catalog', $this->offerModel);
    }
    
    public function showFaq() {
        return view('faq')
        ->with('faq', $this->faqModel);
    }
    
}
