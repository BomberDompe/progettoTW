<?php

namespace App\Http\Controllers;



class PublicController extends Controller {

    public function showHome() {
        return view('home');
    }
    
}
