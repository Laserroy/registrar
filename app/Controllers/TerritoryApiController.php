<?php

namespace App\Controllers;

use App\Models\Territory;

class TerritoryApiController
{
    public function regions()
    {
        $regions = (new Territory())->getRegions();
        echo(json_encode($regions));
    }

    public function cities($regionID)
    {
        $cities = (new Territory())->getCities($regionID);
        echo(json_encode($cities));
    }

    public function districts($cityID)
    {
        $districts = (new Territory())->getDistricts($cityID);
        echo(json_encode($districts));
    }
}