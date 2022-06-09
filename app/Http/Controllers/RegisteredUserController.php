<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\OfferList;
use App\Http\Requests\NewMessageRequest;
use App\Http\Requests\UpdateUnreadRequest;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller {

    protected $conversationModel;
    
    public function __construct() {
        $this->middleware('can:isRegisteredUser');
        $this->conversationModel = new Conversation;
        $this->offerListModel = new OfferList;
    }
    
    public function showChat() {
        return view('chat')
            ->with('conversationList',
                $this->conversationModel->getAllConversations(Auth::id()));
    }
    
    public function saveMessage(NewMessageRequest $request) {
        return response()->json($this->conversationModel
            ->createNewMessage($request, Auth::id()));
    }
    
    public function updateUnreadMessages(UpdateUnreadRequest $request) {
        return response()->json($this->conversationModel
            ->updateUnreadMessages($request, Auth::id()));
    }
    
    public function showContract($option_id) {
        
        return view('contract')
                    ->with('dataLario',$this->offerListModel->getLarioByOptionId($option_id, Auth::user()))
                    ->with('dataLore',$this->offerListModel->getLoreByOptionId($option_id))
                    ->with('dataOffer', $this->offerListModel->getOfferByOptionId($option_id));
    }

}