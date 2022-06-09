<?php

namespace App\Models;

use App\Models\Resources\Message;
use App\User;
use DateTime;

class Conversation {

    protected $messageModel;
    protected $userModel;

    public function __construct() {
        $this->messageModel = new Message;
        $this->userModel = new User;
    }

    public function getAllConversations($authId, $newUserId) {
        $relatedUsers;
        if($newUserId) {
            $relatedUsers = array_unique(array_merge(
                        $this->messageModel->getSenders($authId),
                        $this->messageModel->getReceivers($authId),
                        array($newUserId)));
        } else {
            $relatedUsers = array_unique(array_merge(
                        $this->messageModel->getSenders($authId),
                        $this->messageModel->getReceivers($authId)));
        }
        

        $conversationList = array();

        foreach ($relatedUsers as $user) {
            $userData = $this->userModel
                    ->getUserById($user);
            
            $users = array($authId, $user);
            $messageListQuery = $this->messageModel
                    ->getMessagesByConversation($users);
            $messages = $messageListQuery->get();
            $numUnread = $messageListQuery
                            ->where('destinatario_id', $authId)
                            ->where('visualizzato', false)->count();
            
            $messageList = array("messages" => $messages, "numUnread" => $numUnread);
            
            $conversation = array("userData" => $userData, "messageList" => $messageList);
            array_push($conversationList, $conversation);
        }


        return $conversationList;
    }

    public function createNewMessage($data, $authId) {
        $this->messageModel->fill($data->validated());
        $this->messageModel->mittente_id = $authId;
        $this->messageModel->timestamp = date('Y-m-d G:i:s');
        $this->messageModel->visualizzato = false;
        $this->messageModel->save();

        $dateTime = DateTime::createFromFormat(
                        'Y-m-d G:i:s', $this->messageModel->timestamp)->format('d/m/Y G:i');
        return array("contenuto" => $this->messageModel->contenuto,
            "timestamp" => $dateTime);
    }

    public function updateUnreadMessages($data, $authId) {
        $users = array($authId, $data->userId);
        $this->messageModel->getUnreadMessagesByConversation($users)
                ->where('destinatario_id', $authId)->update(['visualizzato' => true]);
    }

    public function createDefaultMessage($offer, $authId) {
        $lore = $this->userModel->find($offer->user_id);
        if ($lore->genere == "Uomo") {
            $this->messageModel->contenuto = "Salve signor " . $lore->name . " " . $lore->surname
                    . "\nsono interessato all'offerta : "
                    . $offer->titolo
                    . "\nsituata in " . $offer->via . ", " . $offer->civico;
        } else {
            $this->messageModel->contenuto = "Salve signora " . $lore->name . " " . $lore->surname
                    . "\nsono interessato all'offerta : "
                    . $offer->titolo
                    . "\nsituata in " . $offer->via . ", " . $offer->civico;
        }
        $this->messageModel->destinatario_id = $lore->id;
        $this->messageModel->mittente_id = $authId;
        $this->messageModel->timestamp = date('Y-m-d G:i:s');
        $this->messageModel->visualizzato = false;
        $this->messageModel->save();
    }

}
