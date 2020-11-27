<?php

namespace App;

class Request
{
    public function getPath()
    {
        return $_SERVER['PATH_INFO'] ?? '/';
    //         echo "<pre>";
    // print_r($_SERVER);
    // echo "</pre>";
    // exit;
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
