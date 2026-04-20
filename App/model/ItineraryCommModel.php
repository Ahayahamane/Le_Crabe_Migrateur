<?php

namespace App\model;

use App\model\AbstractModel;

use App\class\EventComm;
use App\class\Itinerary;
use App\class\ItineraryComm;
use App\class\Repository;

class ItineraryCommModel extends AbstractModel{

    /**
     *enregistrement d'un commentaire
     *@param array $datas = Tableau contenant les differents champ du formulaire de commentaire
     *
     *ne retourne rien
     */
    public function register_comm()
    {
        
        if (isset($_SESSION) && ($_SESSION['user']->get('role') > 0)) {
            $datas = [
                'autor' => ($_SESSION['user'])->get("id"),
                'itinerary' => (int) $_GET['id'],
                'content' => $_POST['content']
            ];
            $itinerary_comm = new ItineraryComm($datas);
            $this->create(ItineraryComm::class, $itinerary_comm->to_array());
        }
    }

    /**
     *récupération des commentaires lié a un évenement
     *@param $event = événement de la recherche
     *
     *@return array Tableau de tout commentaires sous forme d'objets
     */
    public function get_comments_for($itinerary)
    {
        $query = 'SELECT itinerary_com.id, itinerary_com.itinerary, content, date_, psedonym 
            FROM itinerary_com
            JOIN user_
            ON ((itinerary_com.autor = user_.id) 
            AND (itinerary_com.itinerary = '.$itinerary.'))';
                        
        $stmt = $this->execute_query($query);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Repository::class);
        return $stmt->fetchAll();
    }

    /**
     *suppression des commentaires
     *@param array $autor = filtre
     *
     *ne retourne rien
     */
    public function delete_comm(array $autor)
    {
        $this-> remove (EventComm::class, $autor);
    }
    
    // public function get_itinerary_by(array $filters){
    //     $itinerary = $this->read_many(ItineraryComm::class,[],$filters);
    //     return $itinerary;
    // }
}