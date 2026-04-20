<?php
namespace App\model;

use Exception;

// singleton de connection à la base de donnée

class DBConnector {
    private static ?DBConnector $instance = null;
    private \PDO $connection;

    // Constructeur privé : empêche l'instanciation directe
    private function __construct(){
        try{
            $this->connection = new \PDO("mysql:dbname=" . $_ENV['DB_NAME'] . "; host=" . $_ENV['DB_HOST'] . "; charset=utf8", 
        $_ENV['DB_LOGIN'],
        $_ENV['DB_PASSWORD']);
        }
        catch(Exception $e){
           displayError($e->getMessage());
        }
    }

    // Méthode statique pour récupérer l'unique instance
    public static function get_instance(): DBConnector {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Accéder à la connexion PDO
    public function get_connection(): \PDO {
        return $this->connection;
    }
}