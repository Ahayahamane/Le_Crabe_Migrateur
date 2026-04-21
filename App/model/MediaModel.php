<?php

namespace App\model;

use App\controller\MediaController;
use App\model\AbstractModel;
use App\class\Repository;

class MediaModel extends AbstractModel
{
    /**
     *enregistrement d'un media
     *@param array $datas = Tableau contenant les differents information nécésaire a l'enregistrement
     *ne retourne rien
     */
    public function register_media($datas)
    {
        $this->create(MediaController::class, $datas);
    }

    /**
     * récupération d'un média pour un événement
     * @param $event = identifiant de l'événement
     */
    public function get_media_for($event)
    {
        $query = 'SELECT media.path, media.type
            FROM illustrate_evt 
            JOIN event 
            ON ((event.id = illustrate_evt.event) AND (event.id = :id)) 
            JOIN media
            ON illustrate_evt.media = media.id';

        $stmt = $this->execute_query($query, ['id' => $event]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Repository::class);
        return $stmt->fetchAll();
    }
}
