<?php

namespace app\model;

use app\model\AbstractModel;
use app\class\Message;

class MessageModel extends AbstractModel{
    public function register_message(array $params)
    {
        $this->create(Message::class, $params);
    }
}