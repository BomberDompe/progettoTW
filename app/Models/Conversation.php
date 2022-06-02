<?php

namespace App\Models;

use App\Models\Resources\Message;
use App\User;

class Conversation {
    
    protected $messageModel;
    protected $userModel;
    
    public function __construct() {
        $this->messageModel = new Message;
        $this->userModel = new User;
    }
    
    public function getAllConversations($authId) {
        $authUser = $this->userModel->getUsernameById($authId);
        print($authUser);
        $relatedUsers = array_unique(array_merge(
            $this->messageModel->getSenders($authUser),
            $this->messageModel->getReceivers($authUser)));
        
        $conversationList = array();
        if (!empty($relatedUsers)) {
            foreach ($relatedUsers as $user) {
                //print($user);
                $userData = $this->userModel
                    ->getByUsername($user);
                $users = array($authUser, $user);
                $messages = $this->messageModel
                    ->getMessagesByConversation($users)->get();
                $conversation = array("userData" => $userData, "messages" => $messages);
                array_push($conversationList, $conversation);
            }
        }
        
        return $conversationList;
    }
    

}
