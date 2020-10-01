<?php

namespace App\Models;

use App\DB;
use PDO;

class Territory
{
    public $db;

    public function __construct()
    {
        $this->db = new DB();
    }
    
    public function getRegions()
    {
        $sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_level = 1";
        $stmt = $this->db->connection->query($sql);
        $regions = $stmt->fetchAll(PDO::FETCH_NUM);

        return $regions;
    }

    public function getCities($regionID)
    {
        $sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_pid = $regionID AND ter_type_id = 1";
        $stmt = $this->db->connection->query($sql);
        $cities = $stmt->fetchAll(PDO::FETCH_NUM);

        return $cities;
    }


    public function getDistricts($cityID)
    {
        $sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_type_id = 3 AND ter_pid = $cityID";
        $stmt = $this->db->connection->query($sql);
        $districts = $stmt->fetchAll(PDO::FETCH_NUM);

        return $districts;
    }
}
