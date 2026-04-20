<?php

namespace App\model;

use App\controller\MediaController;
use App\model\AbstractModel;

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
}
