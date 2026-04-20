<?php

namespace App\controller;

use App\controller\AbstractController;


class ContactsController extends AbstractController
{

    public function first_contact_page()
    {
        $datas = [
            "links" => '<link rel="stylesheet" href="public/css/contacts.css">'
        ];
        return $this->display_vue('/main/contacts.php', $datas);
    }
    
    public function contact_page() {

    }
}
