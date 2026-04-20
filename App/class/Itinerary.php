<?php

namespace App\class;

class Itinerary extends AbstractEntity
{

    const table_name = 'itinerary';

    protected int $id;
    protected string $title;
    protected string $description;
    protected string $start;
    protected string $difficulty;
    protected ?int $length;
    protected string $duration;
    protected string $advice;
    protected string $media;

    public function __construct(array $datas = [])
    {
        
        $this->id = $datas['id'] ?? 0;
        $this->title = htmlspecialchars($datas['title'] ?? '');
        $this->description = htmlspecialchars($datas['description'] ?? '');
        $this->start = htmlspecialchars($datas['start'] ?? '');
        $this->difficulty = htmlspecialchars($datas['difficulty'] ?? '');
        $this->length = $datas['length'] ?? null;
        $this->duration = htmlspecialchars($datas['duration'] ?? '');
        $this->advice = htmlspecialchars($datas['advice'] ?? '');
        $this->media = htmlspecialchars($datas['path'] ?? null);
    }

    public function to_array(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'start' => $this->start,
            'difficulty' => $this->difficulty,
            'length' => $this->length,
            'duration' => $this->duration,
            'advice' => $this->advice,
            'media' => $this->media
        ];
    }
}
