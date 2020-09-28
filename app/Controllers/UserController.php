<?php

namespace App\Controllers;

use App\DbConnection;

class UserController
{
    public function store()
    {
        $terID = $_POST['district'] === 'no districts'
            ? htmlspecialchars($_POST['city'])
            : htmlspecialchars($_POST['district']);
        $userName = htmlspecialchars($_POST['fullName']);
        $userEmail = htmlspecialchars($_POST['email']);
        $conn = DbConnection::make();
        $sql = "SELECT id FROM users WHERE email = '$userEmail'";
        $stmt = $conn->query($sql);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($user) {
           print_r($user->id);
        } else {
            $insertSql = "INSERT INTO users (name, email, territory)
                        VALUES ('$userName',
                                '$userEmail',
                                (SELECT ter_id FROM t_koatuu_tree WHERE ter_id = $terID))";
            $conn->query($insertSql);
        }


        $conn = null;
    }

    public function show($userID)
    {
        echo $userID;
    }
}