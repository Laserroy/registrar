<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function store()
    {
        $territoryID = $_POST['district'] === 'no districts'
            ? htmlspecialchars($_POST['city'])
            : htmlspecialchars($_POST['district']);
        $userName = htmlspecialchars($_POST['fullName']);
        $userEmail = htmlspecialchars($_POST['email']);

        $newUser = new User($userName, $userEmail, $territoryID);

        if (!$newUser->exists()) {
            $newUser->create();
            echo json_encode('');
        } else {
            echo json_encode((new User())->find($newUser->getID()));
        }
    }
}
