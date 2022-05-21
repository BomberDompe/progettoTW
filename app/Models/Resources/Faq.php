<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model {

    protected $table = 'faqs';
    protected $primaryKey = 'faq_id';
    public $timestamps = false;
    
    public function getAllFaqs() {
        return $this;
    }
}
