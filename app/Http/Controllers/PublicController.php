<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use App\Models\Catalog;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\LocatarioController;

class PublicController extends Controller {

    protected $catalogModel;
    protected $faqModel;
    
    public function __construct() {
        $this->catalogModel = new Catalog;
        $this->faqModel = new Faq;
    }
    
    public function showCatalog() {
        return view('catalog')
            ->with('catalog', $this->catalogModel->getAllOffers(3))
            ->with('pagination', true);
    }
    
    public function showFaqs() {
        return view('faqs')
            ->with('faqs', $this->faqModel->getAllFaqs(3));
    }
    public function showDetails($offerId) {
        $offer = $this->catalogModel->getOfferById($offerId);
        $user = new User;
        if(Auth::check()){
        if($user->hasRole(Auth::user()->role)){
            $controller = new LocatarioController;
            $controller->showOptionButton($offer);
        }
        
        }
        return view('details')
            ->with('offer', $offer);
    }
    
}
