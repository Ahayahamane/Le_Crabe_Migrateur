<?php

namespace App\controller;

use App\class\Itinerary;
use App\class\Validator;
use App\model\ItineraryModel;
use App\model\ItineraryCommModel;

use App\controller\AbstractController;
use App\controller\tools\MediaTools;


class ItineraryController extends AbstractController
{

    /**
     * Récupere les éléments nécéssaire à la page "liste des itinéraires" et retourne
     * le rendu correspondant
     */
    public function itin_list_page()
    {
        $itinerary_model = new ItineraryModel;
        $last_itinerarys = $itinerary_model->last_itinerary(12);
        $datas = [
            "meta"=> [
                "keywords"=>"liste d'itinéraires, itinéraires de randonée",
                "description"=>"Liste des itinéraires proposé par notre association",
                "title"=>"Liste des itinéraires"
            ],
            "last_itinerarys" => $last_itinerarys,
            "links" => '<link rel="stylesheet" href="public/css/itineraryList.css">
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />'
        ];
        return $this->display_vue('/main/itineraryList.php', $datas);
    }

    /**
     * Récupere les éléments nécéssaire au détail d'un itinéraire et retourne
     * le rendu correspondant
     */
    public function itin_zoom_page()
    {
        $id = $_GET['id'];
        $itinerary = new ItineraryModel;
        $itinerary = $itinerary->get_one(['Id' => $id]);
        $comments = new ItineraryCommModel;
        $comments = $comments->get_comments_for($id);
        $json_content = file_get_contents(MEDIAS . $itinerary->get('track'));


        $datas = [
            "meta"=> [
                "keywords"=>$itinerary->get("title"),
                "description"=>$itinerary->get("description"),
                "title"=>"Zoom:" . $itinerary->get("title")
            ],
            'json' => $json_content,
            'itinerary' => $itinerary,
            'comments' => $comments,
            'links' => '<link rel="stylesheet" href="public/css/itineraryZoom.css">
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />'
        ];
        return $this->display_vue('/main/itineraryZoom.php', $datas);
    }

    public function comment_itinerary()
    {
        $comm_model = new ItineraryCommModel;
        $comm_model->register_comm();
        $id = $_GET['id'];
        $_SESSION['message'] = 'commentaire enregistré';
        header("location:?path=itinerary_zoom&id=$id");
    }

    public function first_new_itinerary()
    {
        if (empty($_SESSION['user']) || $_SESSION['user']->get('role') < 1) {

            $datas = [
                'links' => '<link rel="stylesheet" href="public/css/login.css">'
            ];
            return $this->display_back_vue('/back/login.php', $datas);
        }

        $datas = [
            'links' => '<link rel="stylesheet" href="public/css/newItinerary.css">'
        ];
        return $this->display_back_vue('/back/newItinerary.php', $datas);
    }

    public function new_itinerary()
    {
        if (empty($_SESSION['user']) || $_SESSION['user']->get('role') < 1) {

            $datas = [
                'links' => '<link rel="stylesheet" href="public/css/login.css">'
            ];
            return $this->display_back_vue('/back/login.php', $datas);
        }
        $rules = [
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:250'],
            'start' => ['required', 'max:30'],
            'difficulty' => ['required'],
            'length' => ['required', 'int'],
            'duration' => ['max:10'],
            'advice' => ['max:100'],
        ];
        $validator = new Validator($_POST);
        $errors = $validator->validate($rules);
        $new_media = new MediaTools;

        if (!empty($_FILES['json_data'])) {
            $return = $new_media->validate_media($_FILES['json_data']);
            if (!empty($return['file'])) {
                $errors += $return['file'];
            }
        } else {
            $errors['file'][] = 'Fichier au format JSON requis';
        }

        if (empty($errors)) {
            $errors = $new_media->register_itinerary();

            if (empty($errors)) {
                $datas = $_POST;
                $datas['track'] = $new_media->get_path();
                $new_itinerary = new Itinerary($datas);
                $itinerary_model = new ItineraryModel;
                $itinerary_model->register_itinerary($new_itinerary->to_array());
                $_SESSION["message"] = 'Itinéraire crée avec succes';
                header("location:?path=first_new_itinerary");
            } else {
                $datas = [
                    'errors' => $errors,
                    'links' => '<link rel="stylesheet" href="public/css/newItinerary.css">'
                ];
                return $this->display_back_vue('/back/newItinerary.php', $datas);
            }
        } else {
            $datas = [
                'errors' => $errors,
                'links' => '<link rel="stylesheet" href="public/css/newItinerary.css">'
            ];
            return $this->display_back_vue('/back/newItinerary.php', $datas);
        }
    }
}
