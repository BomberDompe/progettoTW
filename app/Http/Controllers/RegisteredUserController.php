<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller {

    protected $conversationModel;
    
    public function __construct() {
        //$this->middleware('can:isRegisteredUser');
        $this->conversationModel = new Conversation;
    }
    
    public function showChat() {
        return view('chat')
            ->with('conversations',
                $this->conversationModel->getAllConversations(/*Auth::id()*/1));
    }

}