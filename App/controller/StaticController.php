<?php

namespace App\controller;

class StaticController extends AbstractController
{
    public function asso()
    {
        $datas = ["meta"=> [
                "keywords"=>"association le crabe migrateur",
                "description"=>"Présentation de l'association",
                "title"=>"Présentation de l'association"
            ],
            'links'=>'<link rel="stylesheet" href="public/css/asso.css">'
        ];
        $this->display_vue('/main/asso.php', $datas);
    }
}
