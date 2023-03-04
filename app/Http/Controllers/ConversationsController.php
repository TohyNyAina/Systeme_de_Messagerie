<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\User;
use App\Models\Message;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\ConversationRepository;

class ConversationsController extends Controller
{

    private $r;
    private $auth;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth) 
    {
        $this->r = $conversationRepository;
        $this->auth = $auth;
    }
    
    
    public function index () {
        // $users = User::select('name', 'id')->where('id', '!=', Auth::user()->id)->get();
        // return view('conversations/index', compact('users'));

        return view('conversations/index', [
            'users' => $this->r->getConversations($this->auth->user()->id)
        ]);
    }

    public function show (User $user) {
        // $users = User::select('name', 'id')->where('id', '!=', Auth::user()->id)->get();
        // return view('conversations/show', compact('users', 'user'));

        return view('conversations/show', [
            'users'=> $this->r->getConversations($this->auth->user()->id),
            'user'=>$user,
            'messages'=>$this->r->getMessagesFor($this->auth->user()->id, $user->id) ->paginate(5)
            // 'unread'=> $this->r->unreadCount($this->auth->user()->id)

        ]);
    }

    public function store (User $user, StoreMessageRequest $request) {
        $this->r->createMessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );
        // return redirect(route('conversations.show', ['id' => $user->id]));
        return redirect(route('conversations.show', compact('user')));
    }

}
