<?php

namespace App\model;

use App\model\AbstractModel;

use App\class\EventComm;
use App\class\Repository;


class EventCommModel extends AbstractModel
{
    /**
     *enregistrement d'un commentaire
     *@param array $datas = Tableau contenant les differents champ du formulaire de commentaire
     *
     *ne retourne rien
     */
    public function register_comm(array $datas)
    {
        if (isset($_SESSION) && ($_SESSION['user']->get('role') > 0)) {
            $datas = [
                'autor' => ($_SESSION['user'])->get("id"),
                'event' => (int) $_GET['id'],
                'content' => $_POST['content']
            ];
        $event_comm = new EventComm($datas);
        $this->create(EventComm::class, $event_comm->to_array());
        }
    }

    /**
     *récupération des commentaires lié a un évenement
     *@param $event = événement de la recherche
     *
     *@return array Tableau de tout commentaires sous forme d'objets
     */
    public function get_comments_for($event)
    {
        $query = 'SELECT event_com.id, event_com.event, content, date_, psedonym 
            FROM event_com 
            JOIN user_ 
            ON ((event_com.autor = user_.id) 
            AND (event_com.event = ' . $event . '))';

        $stmt = $this->execute_query($query);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Repository::class);
        return $stmt->fetchAll();
    }

    /**
     *suppression des commentaires
     *@param array $filters = filtre
     *
     *ne retourne rien
     */
    public function delete_comm(array $filters)
    {
        $this-> remove (EventComm::class, $filters);
    }
}
