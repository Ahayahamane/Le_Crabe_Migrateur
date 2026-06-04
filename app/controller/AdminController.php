<?php

namespace app\controller;

use app\controller\AbstractController;
use app\model\UserModel;
use app\model\ItineraryCommModel;
use app\model\EventCommModel;

class AdminController extends AbstractController
{
    public $user_model;
    public $users;
    public $datas;
    public $commentary;
    public $commentarys;

    



    /**
     * trouve un compte par psedo 
     */
    public function search_users()
    {
        $this->user_model = new UserModel;
        $this->users = $this->user_model->search(['pseudonym' => ('%' . $_POST["pseudonym"] . '%')]);
        
        $this->datas = [
            "meta" => [
                // "keywords" => "randonnée, Lorient, Crabe Migrateur",
                // "description" => "Bienvenue chez Le Crabe Migrateur, 
                // où l'on préfère les détours aux chemins battus. 
                // Ici, chaque randonnée est une invitation à marcher 
                // de côté pour mieux voir le monde. ",
                "title" => "Recherche d'utilisateur"
            ],
            "users" => $this->users,
            "links" => ''
        ];
        var_dump($this->datas["users"]);
        return $this->display_back_vue('/back/adminUsersList.php',$this->datas);
    }

    /**
     * afficher la liste des comptes
     */
    public function get_all_users()
    {
        $this->user_model = new UserModel;
        $this->users = $this->user_model->get_all();
        $this->datas = [
            "meta" => [
                // "keywords" => "randonnée, Lorient, Crabe Migrateur",
                // "description" => "Bienvenue chez Le Crabe Migrateur, 
                // où l'on préfère les détours aux chemins battus. 
                // Ici, chaque randonnée est une invitation à marcher 
                // de côté pour mieux voir le monde. ",
                "title" => "Liste des utilisateurs"
            ],
            "users" => $this->users,
            "links" => ''
        ];
        return $this->display_back_vue('/back/adminUsersList.php',$this->datas);
    }

    /**
     * Liste des commentaires
     */
    public function get_commentarys()
    {
        $this->commentary = new EventCommModel;
        $this->commentarys = $this->commentary->get_all_commentary();
        $this->datas = [
            "meta" => [
                // "keywords" => "randonnée, Lorient, Crabe Migrateur",
                // "description" => "Bienvenue chez Le Crabe Migrateur, 
                // où l'on préfère les détours aux chemins battus. 
                // Ici, chaque randonnée est une invitation à marcher 
                // de côté pour mieux voir le monde. ",
                "title" => "Liste des commentaires"
            ],
            "comments" => $this->commentarys,
            "links" => ''
        ];
        
        return $this->display_back_vue('/back/adminComList.php',$this->datas);
        
    }

    /**
     * Promeut un compte au role d'organisateur
     */
    public function role_organizer()
    {
        $this->user_model = new UserModel;
        $this->user_model->change_role(['role' => 2], $_GET ["id"]);
        header("location:?path=get_all_users");
    }

    /**
     * Rétrograde un compte au role d'utilisateur
     */
    public function role_user()
    {
        $this->user_model = new UserModel;
        $this->user_model->change_role(['role' => 1], $_GET ["id"]);
        header("location:?path=get_all_users");
    }

    /**
     * supprime un compte et ses commentaires sur décision d'un administrateur
     * 
     */
    public function admin_delete_account()
    {
        $id = $_GET['id'];
        $this->user_model = new UserModel;
        $user = $this->user_model->get_by(['id' => '%' . $id . '%']);

        if ($user && $user->get('role') < 3) {


            $itin_comm = new ItineraryCommModel;
            $itin_comm->delete_comm(['id' => $user->get("id")]);
            $event_comm = new EventCommModel;
            $event_comm->delete_comm(['id' => $user->get("id")]);
            $this->user_model->delete_user(['id' => $user->get("id")]);

            $_SESSION['message'] = 'Le compte a bien été supprimé';
            header("location:?path=moderation");
        } else {
            $_SESSION['message'] = 'Vous ne pouvez pas supprimer un compte administrateur';
            header("location:?path=moderation");
        }
    }

    public function admin_detete_com()
    {

    }
}
