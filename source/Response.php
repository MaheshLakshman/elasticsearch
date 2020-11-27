<?php

namespace App;

class Response
{
    public function setStatusCode(int $status)
    {
        http_response_code($status);
    }
}