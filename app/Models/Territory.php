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
        $regionsJson = json_encode($regions);

        return $regionsJson;
    }

    public function getCities($regionID)
    {
        $sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_pid = $regionID AND ter_type_id = 1";
        $stmt = $this->db->connection->query($sql);
        $cities = $stmt->fetchAll(PDO::FETCH_NUM);
        $citiesJson = json_encode($cities);

        return $citiesJson;
    }


    public function getDistricts($cityID)
    {
        $sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_type_id = 3 AND ter_pid = $cityID";
        $stmt = $this->db->connection->query($sql);
        $districts = $stmt->fetchAll(PDO::FETCH_NUM);
        $districtsJson = json_encode($districts);

        return $districtsJson;
    }
}
