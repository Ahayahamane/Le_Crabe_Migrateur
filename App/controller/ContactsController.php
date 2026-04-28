<?php

namespace App\controller;

use App\class\Validator;
use App\class\Message;

use App\controller\AbstractController;
use App\model\MessageModel;

class ContactsController extends AbstractController
{

    public function first_contact_form()
    {
        $datas = [
            "links" => '<link rel="stylesheet" href="public/css/contacts.css">'
        ];
        return $this->display_vue('/main/contacts.php', $datas);
    }

    public function contact_form()
    {
        $rules = [
            'firstname' => ['required', 'max:50'],
            'name' => ['required',],
            'email' => ['required', 'email'],
            'subject' => ['required'],
            'content' => ['required'],
        ];
        $validator = new Validator($_POST);
        $errors = $validator->validate($rules);
        

            if (empty($errors)) {
                $datas = $_POST;
                $new_message= new Message($datas);
                $message_model = new MessageModel;
                $message_model->register_message($new_message->to_array());
                $_SESSION["message"] = 'Message enregistré avec succes';
                header("location:?path=accueil");
            } else {
                $datas = [
                    'errors' => $errors,
                    'links' => '<link rel="stylesheet" href="public/css/contacts.css">'
                ];
                return $this->display_back_vue('/main/contacts.php', $datas);
            }
        
    }
}
