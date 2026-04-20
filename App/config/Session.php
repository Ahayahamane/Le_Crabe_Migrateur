<?php

namespace App\config;

class Session
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_name('craby');
            session_start();
        }
    }
}
