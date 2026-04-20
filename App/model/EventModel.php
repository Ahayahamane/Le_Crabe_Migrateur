<?php
namespace App\model;

use App\model\AbstractModel;
use App\class\Event;

class EventModel extends AbstractModel{

    /**
     *récupération des derniers événements par ordre inverse de parution
     *@param int $number = nombre d'événement à rechercher
     *@param int $offset = nombre d'événement à ignorer avantde retourner le resultat(NULL par defaut)
     *
     *@return array Tableau des événements récupéré sous forme d'objets
     */
    public function last_events(int $number ,?int $offset = null)
    {
        $last_events = $this->read_many(Event::class ,[], [], ['id' => 'DESC'], $number, $offset);       
        return $last_events;
    }

    /**
     *récupération d'un événement
     *@param array $number = filtres de recherche
     *
     *@return object l'événement récupéré sous forme d'objet
     */
    public function get_one(array $filter)
    {
        $event = $this->read_one(Event::class, $filter);
        
        return $event;
    }

    /**
     *enregistrement d'un événement
     *@param array $datas = Tableau contenant les differents champ du formulaire de création d'événement
     *
     *ne retourne rien
     */
    public function register_event($datas){      
        $this->create(Event::class, $datas);
    }

}