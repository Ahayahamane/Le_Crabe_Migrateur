<?php

namespace App\model;

use App\model\AbstractModel;
use App\class\Itinerary;

class ItineraryModel extends AbstractModel
{
    /**
     *récupération des derniers itinéraires par ordre inverse de parution
     *@param int $number = nombre d'itinéraire à rechercher
     *@param int $offset = nombre d'itinéraire à ignorer avantde retourner le resultat(NULL par defaut)
     *
     *@return array Tableau des itinéraires récupéré sous forme d'objets
     */
    public function last_itinerary(int $num, ?int $offset = null)
    {
        $last_itinerary = $this->read_many(Itinerary::class, [], [], ['id' => 'DESC'], $num, $offset);
        return $last_itinerary;
    }

    /**
     *récupération d'un itinéraire
     *@param array $number = filtres de recherche
     *
     *@return object l'itinéraire récupéré sous forme d'objet
     */
    public function get_one($filter)
    {
        $itinerary = $this->read_one(Itinerary::class, $filter);
        return $itinerary;
    }

    /**
     *récupération de tout les itinéraires
     *@param array $number = filtres de recherche
     *
     *@return object les itinéraire récupéré sous forme de tableau d'objets
     */
    public function get_all()
    {
        $itinerary = $this->read_many(itinerary::class);
        return $itinerary;
    }

    /**
     *enregistrement d'un itinéraire
     *@param array $datas = Tableau contenant les differents champ du formulaire de création d'itinéraire
     *
     *ne retourne rien
     */
    public function register_itinerary($data)
    {
        $this->create(Itinerary::class, $data);
    }
}
