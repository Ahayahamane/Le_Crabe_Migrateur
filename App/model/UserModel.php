<?php

namespace App\model;

use App\model\AbstractModel;
use App\class\User;

class UserModel extends AbstractModel
{
    /**
     *récupération d'un utilisateur 
     *@param array $datas = filtres de recherche
     *
     *@return object l'utilisateur sous forme d'objet
     */

    public function get_by(array $datas)
    {
        $exist = $this->read_one(User::class, $datas);
        return $exist;
    }

    /*
    *enregistrement d'un nouvel utilisateur à partir d'une classe
    *$params: un tableau contenet les valeurs à enregistrer
    */

    public function register_user(array $params)
    {
        $this->create(User::class, $params);
    }

    /**
    *suppression d'un utilisateur
    *@param array $target: l'utilisateur a supprimer
    */ 

    public function delete_user(array $target)
    {
        $this->remove(User::class, $target);
    }
}
