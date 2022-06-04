<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewMessageRequest;

class RegisteredUserController extends Controller {

    protected $conversationModel;
    
    public function __construct() {
        $this->middleware('can:isRegisteredUser');
        $this->conversationModel = new Conversation;
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

}