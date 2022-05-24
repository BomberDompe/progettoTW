<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use App\Models\Catalog;

class PublicController extends Controller {

    protected $catalogModel;
    protected $faqModel;
    
    public function __construct() {
        $this->catalogModel = new Catalog;
        $this->faqModel = new Faq;
    }
    
    public function showCatalog() {
        return view('catalog')
        ->with('catalog', $this->catalogModel->getAllOffers());
    }
    
    public function showFaq() {
        return view('faqs')
        ->with('faqs', $this->faqModel->getAllFaqs());
    }
    public function showDetails() {
        return view('details');
    }
    
}
