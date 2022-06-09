<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use App\Models\Stats;
use App\Http\Requests\FaqRequest;
use App\Http\Requests\StatsRequest;

class AdminController extends Controller {

    protected $faqModel;
    protected $statsModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->faqModel = new Faq;
        $this->statsModel = new Stats;
        
    }

    public function showFaqList() {
        return view('faqview')
            ->with('faqList', $this->faqModel->getAllFaqs()->get());
    }

    public function deleteFaq($faq_id) {
        $this->faqModel->find($faq_id)->delete();
        return redirect()->action('AdminController@showFaqList');
    }

    public function showInsertFaqForm() {
        return view('form/faqform');
    }

    public function showUpdateFaqForm($faq_id) {
        return view('form/faqform')
            ->with('faq', $this->faqModel->find($faq_id));
    }

    public function insertFaq(FaqRequest $request) {
        $this->faqModel->fill($request->validated());
        $this->faqModel->save();
        return redirect()->action('AdminController@showFaqList');
    }

    public function updateFaq(FaqRequest $request) {
        $faq = $this->faqModel->find($request["faq_id"]);
        $faq->fill($request->validated());
        $faq->save();
        return redirect()->action('AdminController@showFaqList');
    }
    
    public function showStatsPage() {
        return view('stats');
    }
    
    public function showFilteredStats(StatsRequest $filters) {
        return view('stats')
            ->with('stats', $this->statsModel->getStatsByFilters($filters));
    }

}
