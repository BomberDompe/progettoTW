<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use App\Http\Requests\Request;

class AdminController extends Controller {

    protected $faqModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->faqModel = new Faq;
    }

    public function showFaqList() {
        return view('faqview')
                        ->with('faqList', $this->faqModel->getAllFaqs()->get());
    }

    public function deleteFaq($faq_id) {
        Faq::find($faq_id)->delete();
        return redirect()->action('AdminController@showFaqList');
    }

    public function showInsertFaqForm() {
        return view('form/faqform');
    }

    public function showUpdateFaqForm() {
        return view('form/faqform');
    }

    public function insertFaq(OfferRequest $request) {
        
    }

    public function updateFaq(OfferRequest $request) {
        
    }

}
