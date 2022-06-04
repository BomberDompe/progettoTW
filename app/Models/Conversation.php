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
        $relatedUsers = array_unique(array_merge(
            $this->messageModel->getSenders($authId),
            $this->messageModel->getReceivers($authId)));
        /*
        foreach ($relatedUsers as $user) {
            print(' Users: ' . $user);
        }
         */
        
        $conversationList = array();
        
        foreach ($relatedUsers as $user) {
            $userData = $this->userModel
                ->getUserById($user);
            /*
            print_r($userData);
             */
            $users = array($authId, $user);
            $messageListQuery = $this->messageModel
                ->getMessagesByConversation($users);
            $messages = $messageListQuery->get();
            $numUnread = $messageListQuery
                ->where('destinatario_id', $authId)
                ->where('visualizzato', false)->count();
            /*
            print(" Unread: " . $numUnread);
             */
            $messageList = array("messages" => $messages, "numUnread" => $numUnread);
            /*
            foreach ($messages as $message) {
                print($message);
            }
             */
            $conversation = array("userData" => $userData, "messageList" => $messageList);
            array_push($conversationList, $conversation);
        }
        
        /*
        foreach ($conversationList as $conversation) {
            print(' Conversation: ' . $conversation);
        }
         */
        
        return $conversationList;
    }
    
    public function createNewMessage($data, $authId) {
        $this->messageModel->fill($data->validated());
        $this->messageModel->mittente_id = $authId;
        $this->messageModel->timestamp = null;
        $this->messageModel->visualizzato = false;
        $this->messageModel->save();
        
        return $this->messageModel;
    }
    

}
