<?php

namespace App\class;

class AbstractEntity
{
    public function get($dataName): mixed
    {
        return $this->$dataName;
    }

    public function set($dataName, $value)
    {
        $this->$dataName = $value;
    }
}
