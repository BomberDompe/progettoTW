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
            if (Auth::check() && Auth::user()->hasRole('locatario')) {
                $controller = new LocatarioController;
           
                return view('details')
                        ->with('offer', $offer)
                            ->with('option',$controller->showOptionButton($offer->offerta_id))
                                ->with('flag',$controller->showButtons($offer->offerta_id));
            } else {

            return view('details')
                            ->with('offer', $offer);
        }
    }

}
