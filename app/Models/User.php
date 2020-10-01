<?php

namespace App\Models;

use App\DB;

class User
{
    protected $db;
    protected $name;
    protected $email;
    protected $terID;

    public function __construct($userName, $userEmail, $territoryID)
    {
        $this->db = new DB();
        $this->name = $userName;
        $this->email = $userEmail;
        $this->terID = $territoryID
    }

    public function getID()
    {
        $sql = "SELECT id FROM users WHERE email = '$this->email'";
        $stmt = $this->db->connection->query($sql);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);
        return $user->id;
    }

    public function create()
    {
        $insertSql = "INSERT INTO users (name, email, territory)
                        VALUES ('$this->name',
                                '$this->email',
                                (SELECT ter_id FROM t_koatuu_tree WHERE ter_id = $this->terID))";
        $status = $this->db->connection->exec($insertSql);

        return $status;
    }
}