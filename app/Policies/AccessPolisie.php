<?php

use App\Models\User;

Class AccessPolisie {

public function index(User $user){
    return true;
}

public function create(User $user){
    return true;
}

}