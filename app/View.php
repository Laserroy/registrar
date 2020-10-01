<?php

namespace App;

class View
{
    public const BASE_PATH = __DIR__ . '/../resources/views/';

    public static function render($view, $data = [])
    {
        extract($data);
        ob_start();
        require self::BASE_PATH . $view;
        $output = ob_get_clean();
        echo $output;
    }
}
