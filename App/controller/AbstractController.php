<?php
namespace App\controller;

abstract class AbstractController {

    public array $breadcrumb;

    /**
    * selection de la vue a afficher et transmition 
    * des données pour la completter
    *
    * @param string $view   Chemin du modele de vue à afficher 
    * @param array $data    Tableau de données à transmetre pour completter le modele (optionnel)
    */
    protected function display_vue(string $view,array $datas=[]): void{
        $view_path = VUE . $view;
        $breadcrumb = $this->breadcrumb;
        
        require_once VUE . '/layout.php';
    }

    /**
    * selection de la vue a afficher et transmition 
    * des données pour la completter
    *
    * @param string $view   Chemin du modele de vue à afficher 
    * @param array $data    Tableau de données à transmetre pour completter le modele (optionnel)
    */
    protected function display_back_vue(string $view,array $datas=[]): void{
        $view_path = VUE . $view;
        $breadcrumb = $this->breadcrumb;
        
        require_once VUE . '/layout_back.php';
    }

    /*
    *fonction de redirection
    *$route: la route vers laquelle rediriger
    *$parametres: des parametres d'URL GET (optionel)
    */

    /**
    * Redirige l'utilisateur vers une route spécifique avec des paramètres optionnels.
    *
    * @param string $route Chemin de la route vers laquelle rediriger.
    *                      Exemple : 'event_zoom', 'home', 'login'
    *
    * @param array $params Tableau associatif de paramètres à ajouter à l'URL.
    *                      Clé : nom du paramètre
    *                      Valeur : valeur du paramètre (sera convertie en chaîne)
    *                      Exemple : ['id' => 1]
    *                      Par défaut : tableau vide (aucun paramètre supplémentaire)
    *
    * Cette méthode ne retourne rien car elle termine l'exécution du script.
    *
    * @example
    * // Redirection simple
    * $this->redirect_to('home');
    *
    * // Redirection avec paramètres
    * $this->redirect_to('event_zoom', ['id' => 123, 'type' => 'premium']);
    */
    protected function redirect_to(string $route, array $params=[]): void {

        //uri génére l'URL complette de la redirection
        $uri = $_SERVER['SCRIPT_NAME'] . "?path=" . $route;

        //si des parametres sont définit alors ils serront ajouté a notre URL
        if(!empty($params)) {
            $str_params = [];
            foreach ($params as $keys => $val) {
                array_push($str_params, urlencode((string) $keys) . '=' . urlencode((string) $val));
            }
            $uri .= '&' . implode('&', $str_params);
        }
        header("Location: " . $uri);
        exit;
    }

    public function setBreadcrumb(array $array) {
        $this->breadcrumb = $array;
    }
}