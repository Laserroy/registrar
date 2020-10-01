<?php

namespace App\Controllers;

use App\DB;

class UserController
{
    public function store()
    {
        $terID = $_POST['district'] === 'no districts'
            ? htmlspecialchars($_POST['city'])
            : htmlspecialchars($_POST['district']);
        $userName = htmlspecialchars($_POST['fullName']);
        $userEmail = htmlspecialchars($_POST['email']);
        $db = new DB();
        $sql = "SELECT id FROM users WHERE email = '$userEmail'";
        $stmt = $db->connection->query($sql);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($user) {
           $this->show($user->id);
        } else {
            $insertSql = "INSERT INTO users (name, email, territory)
                        VALUES ('$userName',
                                '$userEmail',
                                (SELECT ter_id FROM t_koatuu_tree WHERE ter_id = $terID))";
            $db->connection->query($insertSql);
        }
    }

    public function show($userID)
    {
        echo $userID;
    }
}