<?php

namespace App\controller;

use App\class\Message;
use App\class\Validator;

use App\controller\AbstractController;
use App\model\MessageModel;

class MessageController extends AbstractController{
    /**
    *Affiche la page contenant le formulaire de contact vierge
    */
    public function first_contact_form()
    {
        $datas = [
            "meta"=> [
                "keywords"=>"",
                "description"=>"",
                "title"=>""
            ],
            "links" => '<link rel="stylesheet" href="public/css/contact.css">'
        ];
        return $this->display_vue('/main/contact.php', $datas);
    }

    /** 
     * Traite à la fois l'affichage du formulaire de contact
     * et la validation des données soumises. Vérifie l'unicité de l'email et
     * valide les règles de saisie
     *
     * Retourne le rendu de la vue correspondante.
     *   - Vue dde contact en cas d'erreur ou d'affichage initial
     *   - Message de succès en cas d'enregistrement validé et retour à l'accueil
     */
    public function contact_form()
    {

        $errors = [];
        $rules = [
            'email' => ['required', 'email'],
            'firstname' => ['required', 'min:3'],
            'name' => ['required', 'min:3'],
            'subject' => ['required', 'max:50'],
            'content' => ['required'],
        ];
        $validator = new Validator($_POST);
        $errors = $validator->validate($rules);
        

        if (empty($errors)) {
            $new_message = new Message($_POST);
            $message_model = new MessageModel();
            $message_model->register_message( $new_message->to_array());
            $_SESSION['message'] = 'Votre message a été enregisté avec succes';
            header("location:?path=accueil");
        } else {
            $datas = [
                "errors" =>$errors,
                "links" => '<link rel="stylesheet" href="public/css/message.css">'
            ];
            return $this->display_vue('/main/contact.php', $datas);
        }
    }

}