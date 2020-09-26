<?php

namespace App;

class Territory
{
    public function getRegions()
    {
        $conn = DbConnection::make();
        $sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_level = 1";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(\PDO::FETCH_NUM);
        $json = json_encode($result);

        echo $json;

        $conn = null;
    }

    public function getCities($regionID)
    {
        $conn = DbConnection::make();
        $sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_pid = $regionID AND ter_type_id = 1";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(\PDO::FETCH_NUM);
        $json = json_encode($result);

        echo $json;

        $conn = null;
    }


    public function getDistricts($cityID)
    {
        $conn = DbConnection::make();
        $sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_type_id >= 2 AND ter_pid = $cityID";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(\PDO::FETCH_NUM);
        $json = json_encode($result);

        echo $json;

        $conn = null;
    }
}
