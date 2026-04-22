<?php

namespace App\model;

use App\model\AbstractModel;
use App\class\Message;

class MessageModel extends AbstractModel{
    public function register_message(array $params)
    {
        $this->create(Message::class, $params);
    }
}