<?php

namespace App\Models;

use App\DB;
use PDO;

class User
{
    protected $db;
    protected $name;
    protected $email;
    protected $terID;

    public function __construct($userName = null, $userEmail = null, $territoryID = null)
    {
        $this->db = new DB();
        $this->name = $userName;
        $this->email = $userEmail;
        $this->terID = $territoryID;
    }

    public function getID()
    {
        $sql = "SELECT id FROM users WHERE email = '$this->email'";
        $stmt = $this->db->connection->query($sql);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user->id;
    }

    public function exists()
    {
        return empty($this->getID()) ? false : true;
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

    public function find($userID)
    {
        $sql = "SELECT * FROM users JOIN t_koatuu_tree ON ter_id = users.territory WHERE id = '$userID'";
        $stmt = $this->db->connection->query($sql);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}