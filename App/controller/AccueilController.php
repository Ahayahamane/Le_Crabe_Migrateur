<?php

namespace App\controller;


use App\model\EventModel;
use App\model\ItineraryModel;
use App\model\UserModel;

use App\class\Validator;

use App\controller\AbstractController;


class AccueilController extends AbstractController
{

    public function main()
    {

        $last_events = $this->get_last_events();

        $last_itinerary = $this->get_last_itinerary();

        // construction du tableau de transfers des informations
        $datas = [
            "event" => $last_events,
            "itinerary" => $last_itinerary,
            "links" => '<link rel="stylesheet" href="public/css/accueil.css">
                        <link rel="stylesheet" href="public/css/weather.css">',
            "media" => null
        ];

        return $this->display_vue('/main/accueil.php', $datas);
    }

    /**
     * récupére les 5 derniers evenements et les retourne sous forme de tableau d'objets
     */
    public function get_last_events()
    {
        $event_model = new EventModel();
        return $event_model->last_events(5);
    }

    /**
     * récupére les 10 derniers itinéraires et les retourne sous forme de tableau d'objets
     */
    public function get_last_itinerary()
    {
        $itinerary_model = new ItineraryModel();
        $ten_last = $itinerary_model->last_itinerary(10);

        return $ten_last;
    }


    public function backoffice_accueil() 
    {
        $datas = [
            'links'=> '<link rel="stylesheet" href="public/css/backoffice_accueil.css">'
        ];
        return $this->display_back_vue('/back/backoffice_accueil.php',$datas);
    }
}
