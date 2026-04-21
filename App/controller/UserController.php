<?php

namespace App\controller;

use App\class\User;
use App\class\Validator;

use App\controller\AbstractController;
use App\model\EventCommModel;
use App\model\ItineraryCommModel;
use App\model\UserModel;

class UserController extends AbstractController
{
    private array $errors;
    private array $rules;
    private array $datas;
    /**
    *Affiche le formulaire de connection vide lors de la 1ere tentative
    */
    public function first_login_form()
    {
        $datas = [
            "links" => '<link rel="stylesheet" href="public/css/login.css">'
        ];
        return $this->display_vue('/main/login.php', $datas);
    }

    /**
     * Valide des informations soumises lors d'une tentative de connection 
     *
     * Retourne la vue correspondante.
     *   - Vue de connexion en cas d'erreur ou d'affichage initial
     *   - Vue d'accueil en cas de succès
     */
    public function login_form()
    {
        $errors = [];
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $validator = new Validator($_POST);
        $errors = $validator->validate($rules);

        if (empty($errors)) {
            $user_model = new UserModel();
            $user = $user_model->get_by(['email'=>htmlspecialchars($_POST["email"])]);

            if (!empty($user) && password_verify($_POST["password"], $user->get('password'))) {
                $_SESSION["user"] = $user;
                $fullName = $user->get('firstname') . ' ' . $user->get('name');
                $_SESSION["message"] = "Bienvenue $fullName <br>";

                header("location:?path=accueil");
            } else {
                $errors["wrong"] = 'Utilisateur ou mot de passe erroné';
                $links = '<link rel="stylesheet" href="public/css/login.css">';
                $datas = [
                    'errors' => $errors,
                    'links' => $links
                ];
                return $this->display_vue('/main/login.php', $datas);
            };
        } else {
            $links = '<link rel="stylesheet" href="public/css/login.css">';
            $datas = [
                'errors' => $errors,
                'links' => $links
            ];
            return $this->display_vue('/main/login.php', $datas);
        }
    }

    /**
    *"Déconnecte" l'utilisateur en réinitialisant les valeurs de la variable $_SESSION
    */
    public function logout()
    {
        $_SESSION["user"] = null;
        $_SESSION['message'] = 'Votre compte a bien été déconnecté';
        header("location:?path=accueil");
    }

    /**
    *"Déconnecte" l'utilisateur en réinitialisant les valeurs de la variable $_SESSION
    */
    public function logout_back()
    {
        $_SESSION["user"] = null;
        $_SESSION['message'] = 'Votre compte a bien été déconnecté';
        header("location:?path=backoffice");
    }

    /**
    *Affiche la page contenant les informations du compte actuellement connecté
    */
    public function my_account()
    {
        $datas = [
            "links" => '<link rel="stylesheet" href="public/css/myAccount.css">'
        ];
        return $this->display_vue('/main/myAccount.php',$datas);
    }

    /**
    *Affiche la page contenant le formulaire d'inscription vierge
    */
    public function first_register_form()
    {
        $datas = [
            "links" => '<link rel="stylesheet" href="public/css/newAccount.css">'
        ];
        return $this->display_vue('/main/newAccount.php', $datas);
    }

    /** 
     * Traite à la fois l'affichage du formulaire d'inscription
     * et la validation des données soumises. Vérifie l'unicité de l'email,
     * valide les règles de saisie et hache le mot de passe avant stockage.
     *
     * Retourne le rendu de la vue correspondante.
     *   - Vue d'inscription en cas d'erreur ou d'affichage initial
     *   - Message de succès en cas d'enregistrement validé
     */
    public function register_form()
    {

        $errors = [];
        $rules = [
            'email' => ['required', 'email'],
            'psedonym' => ['required', 'min:3', 'max:20'],
            'firstname' => ['required', 'min:3'],
            'name' => ['required', 'min:3'],
            'password' => ['required'],
        ];
        $validator = new Validator($_POST);
        $errors = $validator->validate($rules);
        

        if (empty($errors)) {
            $new_user = new User($_POST);
            $user_model = new UserModel();
            $user_model->register_user( $new_user->to_array());
            $_SESSION['message'] = 'Votre compte a été enregisté avec succes';
            header("location:?path=accueil");
        } else {
            $datas = [
                "errors" =>$errors,
                "links" => '<link rel="stylesheet" href="public/css/newAccount.css">'
            ];
            return $this->display_vue('/main/newAccount.php', $datas);
        }
    }


    /**
     * 
     * 
     */
    public function delete_account()
    {
        $user_model = new UserModel;
        $user = $user_model->get_by(['email'=>$_SESSION("user")]);
        //faire apparaitre popup avec demande de mdp
        if ($user && password_verify($_POST["password"], $user->get('password'))) {
            if ($_POST['sup_comment']) {
                $itin_comm = new ItineraryCommModel;
                $itin_comm->delete_comm($user->get("id"));
                $event_comm = new EventCommModel;
                $event_comm->delete_comm($user->get("id"));
                $user_model->delete_user($user->get("id"));
            } else {
                $user_model->delete_user($user->get("id"));
            }
        } else {
            //mauvais mot de passe
        }
    }

     /**
     * 
     */
    public function first_backoffice() {
        $datas=[
           "links" => '<link rel="stylesheet" href="public/css/login.css">'
        ];
        return $this->display_back_vue('/back/login.php', $datas);
    }

    /**
     * 
     */
    public function login_backoffice()
    {

        $errors = [];
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $validator = new Validator($_POST);
        $errors = $validator->validate($rules);

        if (empty($errors)) {
            $user_model = new UserModel();
            $user = $user_model->get_by(['email' => ($_POST["email"])]);

            if (!empty($user) && password_verify($_POST["password"], $user->get('password'))) {
                $_SESSION["user"] = $user;
                $_SESSION["message"] = "Bienvenue" . $user->get('firstname') . " " . $user->get('name');
                if (($user->get('role')) > 2) {
                    header("location:?path=backoffice_accueil");
                } else {
                    $_SESSION["message"] .= "vous ne disposez pas des droit pour acceder au backoffice";
                    header("location:?path=accueil");
                }
            } else {
                $errors["wrong"] = 'Utilisateur ou mot de passe erroné';
                $links = '<link rel="stylesheet" href="public/css/login.css">';
                $datas = [
                    'errors' => $errors,
                    'links' => $links
                ];
                return $this->display_back_vue('/back/login.php', $datas);
            };
        } else {
            $links = '<link rel="stylesheet" href="public/css/login.css">';
            $datas = [
                'errors' => $errors,
                'links' => $links
            ];
            return $this->display_back_vue('/back/login.php', $datas);
        }
    }
}
