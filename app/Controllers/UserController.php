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

        $newUser = new User();

        if (!$newUser->isExists($userEmail)) {
            $newUser->save($userName, $userEmail, $territoryID);
            echo json_encode('');
        } else {
            echo json_encode($newUser->find($userEmail));
        }
    }
}
