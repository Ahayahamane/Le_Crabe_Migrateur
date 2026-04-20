<?php

namespace App\class;

class ItineraryComm extends AbstractEntity{

    const table_name = 'itinerary_com';

    protected int $id;
    protected int $itinerary;
    protected int $autor;
    protected string $date_;
    protected string $content;
    
    public function __construct($datas)
    {
        $this->id=$datas['id'] ?? 0;
        $this->itinerary = htmlspecialchars($datas['itinerary']);
        $this->autor = htmlspecialchars($datas['autor']);
        $this->date_ = date('Y-m-d');
        $this->content = htmlspecialchars($datas['content']);
    }

    public function to_array(){
    return [
        'id'=>$this->id,
        'itinerary'=>$this->itinerary,
        'autor'=>$this->autor,
        'date_'=>$this->date_,
        'content'=>$this->content
    ];
    }
        
    
}