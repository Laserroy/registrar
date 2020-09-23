<?php

namespace App;



class Territory
{
    public static function getRegions()
    {
        $conn = DbConnection::make();
        $sql = "SELECT ter_name FROM t_koatuu_tree WHERE ter_level = 1";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        $json = json_encode($result);

        echo $json;

        $conn = null;
    }

    public static function getCities()
    {

    }


    public static function getDistricts()
    {

    }
}
