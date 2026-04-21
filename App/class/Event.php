<?php
namespace App\class;

class Event extends AbstractEntity{

    const table_name = 'event';

    protected int $id;
    protected string $title;
    protected string $date_;
    protected string $summary;
    protected string $content;
    protected int $itinerary;
    

    public function __construct(array $data =[])
    {
        $this->id = $data['id'] ?? 0;
        $this->title = htmlspecialchars($data['title'] ?? '');
        $this->date_ = htmlspecialchars($data['date_'] ?? '');
        $this->summary = htmlspecialchars($data['summary'] ?? '');
        $this->content = htmlspecialchars($data['content'] ?? '');
        $this->itinerary = $data['itinerary'] ?? 0;
    }

    public function to_array(): array{
        return [
            'title'=> $this->title,
            'date_'=> $this->date_,
            'summary'=> $this->summary,
            'content'=> $this->content,
            'itinerary'=> $this->itinerary           
        ];
    }
    
}