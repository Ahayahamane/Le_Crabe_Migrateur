<?php

namespace app\model;

use app\class\Repository;
use app\model\AbstractModel;
use app\class\User;

class UserModel extends AbstractModel
{
    /**
     *récupération d'un utilisateur 
     *@param array $datas = filtres de recherche
     *
     *@return object l'utilisateur sous forme d'objet
     */

    public function get_by(array $filter)
    {
        return $this->read_one(User::class, $filter);
    }

    public function get_all()
    {
        return $this->read_many(User::class);
    }

    public function search(array $filters)
    {
        $query = '
            SELECT user_.id, user_.pseudonym, user_.email, user_.firstname, user_.name, user_.role
            FROM ' . User::class::table_name . ' 
            WHERE LOWER (';
        foreach (array_keys($filters) as $filter) {
            $query .= $filter . ') LIKE LOWER (:' . $filter .')';
            if ($filter != array_key_last($filters)) $query .= ' AND ';
        };
        $stmt = $this->execute_query($query, $filters);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Repository::class);
        return $stmt->fetchAll();
    }

    /**
     *enregistrement d'un nouvel utilisateur à partir d'une classe
     *@param $params: un tableau contenet les valeurs à enregistrer
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

    public function change_role(array $fields, $target)
    {
        $this->update(User::class, $fields, $target);
    }
}
