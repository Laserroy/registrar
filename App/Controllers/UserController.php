<?php

namespace App\Controllers;

class UserController
{
    public function store()
    {
        $terID = $_POST['district'] === 'no districts' ? $_POST['city'] : $_POST['district'];
        $userName = $_POST['fullName'];
        $userEmail = $_POST['email'];
    }

    public function show($userID)
    {
        echo $userID;
    }
}