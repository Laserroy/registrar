<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        echo file_get_contents(__DIR__ . '/../../public/html/index.html');
    }
}