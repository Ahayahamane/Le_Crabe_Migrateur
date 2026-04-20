<?php
namespace App\class;

use App\class\AbstractEntity;

class Message extends AbstractEntity{

    const table_name = 'message';

    protected int $id;
    protected string $firstname;
    protected string $name;
    protected string $date_;
    protected string $email;
    protected string $subject;
    protected string $content;

    public function __construct($datas)
    {
        $this->firstname = htmlspecialchars($datas["firstname"]);
        $this->name = htmlspecialchars($datas["name"]);
        $this->email = ($datas["email"]);
        $this->subject = htmlspecialchars($datas["subject"]);
        $this->content = htmlspecialchars($datas["content"]);
    }
    
}