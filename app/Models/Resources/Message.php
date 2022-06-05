<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $table = 'messaggi';
    protected $primaryKey = 'messaggio_id';
    public $timestamps = false;
    
    public function getMessagesBySender($username) {
        return $this->where('mittente_id', $username);
    }
    
    public function getSenders($username) {
        $y = $this->getMessagesByReceiver($username)->pluck('mittente_id');
        foreach ($y as $x) {
            print $x;}
        return array_unique(array(
            $this->getMessagesByReceiver($username)->pluck('mittente_id')));
    }
    
    public function getMessagesByReceiver($username) {
        return $this->where('destinatario_id', $username);
    }
    
    public function getReceivers($username) {
        print $this->getMessagesBySender($username)->pluck('destinatario_id');
        return array_unique(array(
            $this->getMessagesBySender($username)->pluck('destinatario_id')));
    }
    
    public function getMessagesByConversation($usernames) {
        return $this->whereIn('mittente_id', $usernames)
            ->whereIn('destinatario_id', $usernames);
    }
    
    public function getNumUnreadMessages($username) {
        return $this->getMessagesByReceiver($username)
            ->where('visualizzato', false)->count();
    }
    
    
}
