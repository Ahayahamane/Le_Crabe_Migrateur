<?php

namespace App\class;

class EventComm extends AbstractEntity{

    const table_name = 'event_com';

    protected int $id;
    protected int $event;
    protected int $autor;
    protected string $date_;
    protected string $content;
    
    public function __construct($datas)
    {
        $this->id=($datas['id']) ?? 0;
        $this->event = htmlspecialchars($datas['event']);
        $this->autor = htmlspecialchars($datas['autor']);
        $this->date_ = date('Y-m-d');
        $this->content = htmlspecialchars($datas['content']);
    }

    public function to_array(){
    return [
        'id'=>$this->id,
        'event'=>$this->event,
        'autor'=>$this->autor,
        'date_'=>$this->date_,
        'content'=>$this->content
    ];
    }
        
    
}