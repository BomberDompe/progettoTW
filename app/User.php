<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'username', 'password', 'genere', 'data_nascita', 'comune_residenza', 'telefono', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->role, $role);
    }
    
    public function getByUsername($userId) {
        return $this->find($userId);
    }
    
    public function getUsernameById($id) {
        return $this->where('id', $id)
            ->select('username')->first();
    }

}
