<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Http\Requests\FilteringRequest;
use App\Models\OfferList;
use App\Models\Resources\Option;
use Illuminate\Support\Facades\Auth;

class LocatarioController extends Controller {

    protected $catalogModel;
    protected $offerListModel;

    public function __construct() {
        //$this->middleware('can:isLocatario');
        $this->catalogModel = new Catalog;
        $this->offerListModel = new OfferList;
    }

    public function showFilteredCatalog(FilteringRequest $request) {
        return view('catalog')
                        ->with('catalog', $this->catalogModel->getByFilters($request->all()))
                        ->with('pagination', false);
    }

    public function showOptionedList() {
        return view('offerview')
                        ->with('offerList', $this->offerListModel->getOffersByOption(Auth::id()))
                        ->with('optionList', $this->offerListModel->getAllOption());
    }

    public function deleteOption($offerId) {
        $autenticati = Option::where('offerta_id', $offerId)->value('locatario_id');
        if (Auth::id() == $autenticati) {
            Option::where('offerta_id', $offerId)->delete();
            return redirect()->action('LocatarioController@showOptionedList');
        }
        return redirect()->action('UserController@index');
    }

}
