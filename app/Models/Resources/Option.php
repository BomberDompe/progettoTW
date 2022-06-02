<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {

    protected $table = 'opzionamenti';
    protected $primaryKey = 'opzionamento_id';
    public $timestamps = false;
}