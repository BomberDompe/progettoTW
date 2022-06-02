<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model {

    protected $table = 'faqs';
    protected $primaryKey = 'faq_id';
    public $timestamps = false;
    
    public function getAllFaqs($elemEachPage = 0) {
        if ($elemEachPage > 0) {
            return $this->where('faq_id', '>=', 0)->paginate($elemEachPage);
        } else {
            return $this->where('faq_id', '>=', 0);
        }
    }
}


