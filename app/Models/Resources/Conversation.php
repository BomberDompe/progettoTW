<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model {

    protected $table = 'conversazioni';
    protected $primaryKey = 'conversazione_id';
    public $timestamps = false;
}
