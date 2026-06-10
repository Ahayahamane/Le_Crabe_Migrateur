<?php

namespace app\config;

class Session
{
    /**
     * Initialise une session s'il n'en existe pas déjà une
     */
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_name('craby');
            session_start();
        }
    }
}
