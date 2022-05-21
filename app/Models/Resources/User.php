<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'utenti';
    protected $primaryKey = 'username_id';
    public $timestamps = false;
    public $incrementing = false;
}
