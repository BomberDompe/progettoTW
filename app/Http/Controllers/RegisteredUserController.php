<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Conversation;
use App\Models\OfferList;
use App\Http\Requests\NewMessageRequest;
use App\Http\Requests\UpdateUnreadRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller {

    protected $conversationModel;
    protected $offerListModel;
    protected $userModel;
    
    public function __construct() {
        $this->middleware('can:isRegisteredUser')->except('showProfile');
        $this->conversationModel = new Conversation;
        $this->offerListModel = new OfferList;
        $this->userModel = new User;
    }
    
    public function showChat($user_id = 0) {
        return view('chat')
            ->with('conversationList',
                $this->conversationModel->getAllConversations(Auth::id(), $user_id))
            ->with('newUserId', $user_id);
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
    
    public function showProfile() {
        return view('profile');
    }
    
    public function showUpdateProfileForm(){
        return view('form/profileform')
            ->with('user', $this->userModel->getUserById(Auth::id()));
    }
    
    public function updateProfile(ProfileRequest $request){
        return $this->userModel->updateUserData($request, Auth::id());
    }

}