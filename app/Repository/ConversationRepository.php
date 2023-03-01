<?php
namespace App\Repository;

use App\Models\User;

class ConversationRepository {

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getConversations (int $userId) {
        return $this->user->newQuery()
        ->select('namr', 'id')
        ->where('id', '!=', $userId)
        ->get();
    }

}