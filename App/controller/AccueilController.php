<?php

namespace App\controller;


use App\model\EventModel;
use App\model\ItineraryModel;

use App\controller\AbstractController;
use App\model\MediaModel;

class AccueilController extends AbstractController
{
    public $last_events;
    public array $media;
    public $media_model;
    public $last_itinerary;
    public $datas;
    public $event_model;
    public $itinerary_model;
    public $ten_last;
    

    public function main()
    {

        $this->last_events = $this->get_last_events();

        for ($i = 0; $i < count($this->last_events); $i++) {
            $this->media_model = new MediaModel();
            $this->media_model = $this->media_model->get_media_for($this->last_events[$i]->get('id'));
            $this->media[$i] = $this->media_model[0]->get('path');
        }
        

        
        $this->last_itinerary = $this->get_last_itinerary();

        // construction du tableau de transfers des informations
        $this->datas = [
            "meta"=> [
                "keywords"=>"randonnée, Lorient, Crabe Migrateur",
                "description"=>"Bienvenue chez Le Crabe Migrateur, 
                où l'on préfère les détours aux chemins battus. 
                Ici, chaque randonnée est une invitation à marcher 
                de côté pour mieux voir le monde. ",
                "title"=>"Accueil - Le Crabe Migrateur"
            ],
            "media" => $this->media,
            "event" => $this->last_events,
            "itinerary" => $this->last_itinerary,
            "links" => '<link rel="stylesheet" href="public/css/accueil.css">
                        <link rel="stylesheet" href="public/css/weather.css">'
        ];
     
        return $this->display_vue('/main/accueil.php', $this->datas);
    }

    /**
     * récupére les 5 derniers evenements et les retourne sous forme de tableau d'objets
     */
    public function get_last_events()
    {
        $this->event_model = new EventModel();
        return $this->event_model->last_events(5);
    }

    /**
     * récupére les 10 derniers itinéraires et les retourne sous forme de tableau d'objets
     */
    public function get_last_itinerary()
    {
        $this->itinerary_model = new ItineraryModel();
        $this->ten_last = $this->itinerary_model->last_itinerary(10);

        return $this->ten_last;
    }


    public function backoffice_accueil()
    {
        $datas = [
            'links' => '<link rel="stylesheet" href="public/css/backoffice_accueil.css">'
        ];
        return $this->display_back_vue('/back/backoffice_accueil.php', $datas);
    }
}
