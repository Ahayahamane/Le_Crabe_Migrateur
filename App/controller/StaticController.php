<?php

namespace App\controller;

class StaticController extends AbstractController
{
    public function asso()
    {
        $datas = [
            'links'=>'<link rel="stylesheet" href="public/css/asso.css">'
        ];
        $this->display_vue('/main/asso.php', $datas);
    }
}
