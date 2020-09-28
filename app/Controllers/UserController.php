<?php

namespace App\Controllers;

class UserController
{
    public function store()
    {
        foreach ($_POST as $k => $v) {
            echo $k . '=>' . $v . PHP_EOL;
        }
    }
}