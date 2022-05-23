<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model {

    protected $table = 'contratti';
    protected $primaryKey = 'contratto_id';
    public $timestamps = false;
}
