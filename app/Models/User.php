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

    public function __construct()
    {
        $this->db = new DB();
    }

    public function isExists($email)
    {
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $stmt = $this->db->connection->query($sql);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return empty($user) ? false : true;
    }

    public function save($name, $email, $terID)
    {
        $insertSql = "INSERT INTO users (name, email, territory)
                        VALUES ('$name',
                                '$email',
                                (SELECT ter_id FROM t_koatuu_tree WHERE ter_id = $terID))";
        $status = $this->db->connection->exec($insertSql);

        return $status;
    }

    public function find($email)
    {
        $sql = "SELECT * FROM users JOIN t_koatuu_tree ON ter_id = users.territory WHERE email = '$email'";
        $stmt = $this->db->connection->query($sql);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}
