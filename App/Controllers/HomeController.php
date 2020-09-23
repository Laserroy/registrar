<?php

namespace App\Controllers;

use App\DbConnection;

class HomeController
{
    public function index()
    {
        echo file_get_contents(__DIR__ . '/../../Public/Html/index.html');
    }
}