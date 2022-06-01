<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Http\Requests\FilteringRequest;

class LocatarioController extends Controller {
    
    protected $catalogModel;

    public function __construct() {
        //$this->middleware('can:isLocatario');
        $this->catalogModel = new Catalog;

    }

    public function showFilteredCatalog(FilteringRequest $request) {
        return view('catalog')
            ->with('catalog', $this->catalogModel->getByFilters($request->all()))
            ->with('pagination', false);
    }

}
