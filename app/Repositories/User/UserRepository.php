<?php

namespace App\Repositories\User;

use App\Repositories\User\UserInterface as UserInterface;
use App\Models\User;

class UserRepository implements UserInterface{
    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    function getAll(){
        return $this->user->getAll();
    }
    function find($id){
        return $this->user->findUser($id);
    }
    function delete($id){
        return $this->user->deleteUser($id);
    }
}