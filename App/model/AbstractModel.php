<?php

namespace App\model;

use App\class\Repository;
use App\model\DBConnector;

class AbstractModel
{

    //connection à la base de données
    private function connect()
    {
        $db = DBConnector::get_instance();
        $conn = $db->get_connection();
        return $conn;
    }

    /**
    *Execute une requette crée préalablement
    *@param $query = requette préparée
    *@param $params = parametres à injecter dans la requette
    *
    *@return object de type PDOStatement
    */

    protected function execute_query(string $query, array $params = []): \PDOStatement
    {
        $db = $this->connect();
        $stmt = $db->prepare($query);
        foreach ($params as $key => $param) $stmt->bindValue($key, $param);
        $stmt->execute();
        return $stmt;
    }



    /*--------------------------------*/
    /*----- methodes de lectures -----*/
    /*--------------------------------*/

    /**
    *récupération d'une ressource dans une entitée à l'aide de filtres
    *@param $class = la ressource (article, utilisateur, commentaire,...)
    *@param array $filters = filtres de la recherche
    *
    *@return object objet contenant la ligne correspondante
    */

    protected function read_one(string $class, array $filters): mixed
    {
        //commence à écrire la requette
        $query = 'SELECT * FROM ' . $class::table_name . ' WHERE ';

        //pour chque clef du tableau $filters ajoute la correspondance 
        //entre la clef et son identifiant dans la requette
        foreach (array_keys($filters) as $filter) {
            $query .= $filter . " = :" . $filter;

            //si la clef actuellement traité n'est pas la derniere
            // du tableau: ajout de l'opérateur SQL 'AND'
            if ($filter != array_key_last($filters)) $query .= ' AND ';
        }

        //execution de la requette
        $stmt = $this->execute_query($query, $filters);

        //configure le mode de fetch pour obtenir un objet
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        
        return $stmt->fetch();
    }


    /**
    *récupération d'une ou plusieurs ressources dans une entitée à l'aide de filtres
    *@param $class = la resource(article, utilisateur, commentaire,...)
    *@param array $filters = filtres de la recherche
    *@param array $order = classement (par id descendants, par date ascendantes, ...)
    *@param $limit = nombre de ressources que l'on souhaite récupérer
    *@param $offset = nombre de ressources à ignorer avant de commencer la récupération 
    *
    *@return array Tableau de toute les lignes correspondantes sous forme d'objet
    */

    protected function read_many(
        string $class,
        array $columns = [],
        array $filters = [], 
        array $order = [], 
        ?int $limit = null, 
        ?int $offset = null): array
    {

        $query = 'SELECT ';

        //selection des colones à afficher
        if (!empty($columns)) {
            foreach ($columns as $column) {
                $query .= $column;
                if ($column != end($columns)) $query .= ', ';
            }
        } else {
            $query .= '*';
        }

        //selection de l'entitée
        $query .= ' FROM ' . $class::table_name;

        //ajout des filtres
        if (!empty($filters)) {
            $query .= ' WHERE ';
            
            foreach (array_keys($filters) as $filter) {
                $query .= $filter . " = :" . $filter;
                if ($filter != array_key_last($filters)) $query .= ' AND ';
            }
        }

        //ajout du classement
        if (!empty($order)) {
            $query .= ' ORDER BY ';
            foreach ($order as $key => $val) {
                $query .= $key . ' ' . $val;
                if ($key != array_key_last($order)) $query .= ', ';
            }
        }

        //ajout des contraintes de récupération
        if (isset($limit)) {
            $query .= ' LIMIT ' . $limit;
            if (isset($offset)) {
                $query .= ' OFFSET ' . $offset;
            }
        }
        

        $stmt = $this->execute_query($query, $filters);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        $result = $stmt->fetchAll();

        return $result;
    }


    /*--------------------------------*/
    /*----- methodes d'écriture' -----*/
    /*--------------------------------*/

    /**
    *Enregistrement d'une nouvelle ressource dans une entitée
    *@param $class = la ressource
    *@param array $fields = les differents champs à enregistrer en BDD
    *
    *@return object de type PDOStatement
    */

    protected function create(string $class, array $fields): \PDOStatement
    {
        
        $query = "INSERT INTO " . $class::table_name . " (";
        foreach (array_keys($fields) as $field) {
            $query .= $field;
            if ($field != array_key_last($fields)) $query .= ', ';
        }
        $query .= ') VALUES (';
        foreach (array_keys($fields) as $field) {
            $query .= ':' . $field;
            if ($field != array_key_last($fields)) $query .= ', ';
        }
        $query .= ')';

        
        return $this->execute_query($query, $fields);
    }

    /**
    *modification d'une ressource existante
    *@param $class = la ressource
    *@param array $fields = les differents champs à modifier
    *@param $id = identifiant de la ressource
    *
    *@return object de type PDOStatement
    */
    protected function update(string $class, array $fields, int $id): \PDOStatement
    {
        $query = "UPDATE " . $class::table_name . " SET ";
        foreach (array_keys($fields) as $field) {
            $query .= $field . " = :" . $field;
            if ($field != array_key_last($fields)) $query .= ', ';
        }
        $query .= ' WHERE id = :id';
        $fields['id'] = $id;
        return $this->execute_query($query, $fields);
    }


    /** 
    *suppression d'une ressource
    *@param $class = la ressource
    *@param $id = valeur du filtre (id)
    *
    *@return object de type PDOStatement
    */
    protected function remove(string $class, array $filters): \PDOStatement
    {
        $query = "DELETE FROM " . $class::table_name;

        if (!empty($filters)) {
            $query .= ' WHERE ';
            
            foreach (array_keys($filters) as $filter) {
                $query .= $filter . " = :" . $filter;
                if ($filter != array_key_last($filters)) $query .= ' AND ';
            }
        }

        return $this->execute_query($query, $filters);
    }

}
