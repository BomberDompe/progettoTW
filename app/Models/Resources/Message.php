<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $table = 'messaggi';
    protected $primaryKey = 'messaggio_id';
    public $timestamps = false;
}
