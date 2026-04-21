<?php

namespace App\controller;


use App\class\Event;
use App\class\Validator;

use App\model\EventModel;
use App\model\EventCommModel;
use App\model\ItineraryModel;
use App\model\MediaModel;

use App\controller\AbstractController;


class EventController extends AbstractController
{

    /**
     * Récupere les éléments nécéssaire à la page "liste des événements" et retourne
     * la vue correspondante
     */
    public function event_list_page()
    {
        $event_model = new EventModel;
        $three_last = $event_model->last_events(3);
        $all_others = $event_model->last_events(9, 3);
        $datas = [
            "three_last" => $three_last,
            "all_others" => $all_others,
            "links" => '<link rel="stylesheet" href="public/css/eventList.css">'
        ];
        return $this->display_vue('/main/eventsList.php', $datas);
    }

    /**
     * Récupere les éléments nécessaire au détail d'un événement et retourne
     * la vue correspondante
     */
    public function event_zoom_page()
    {
        $id = $_GET['id'];
        $event = new EventModel();
        $event = $event->get_one(['id' => $id]);

        $comments = new EventCommModel();
        $comments = $comments->get_comments_for($id);

        $itin_id = $event->get('itinerary');
        $itinerary = new ItineraryModel();
        $itinerary = $itinerary->get_one(['id' => $itin_id]);

        $media = new MediaModel();
        $media = $media->get_media_for($id);
    
        $datas = [
            'media' => $media,
            'event' => $event,
            'comments' => $comments,
            'itinerary' => $itinerary,

            'links' => '<link rel="stylesheet" href="public/css/eventZoom.css">'
        ];
        return $this->display_vue('/main/eventZoom.php', $datas);
    }

    public function comment()
    {
        $datas = [
            'autor' => ($_SESSION['user'])->get("id"),
            'event' => (int) $_GET['id'],
            'content' => $_POST['content']
        ];
        $comm_model = new EventCommModel;
        $comm_model->register_comm($datas);
        $id = $_GET['id'];
        header("location:?path=event_zoom&id=$id");
    }

    public function first_new_event()
    {
        $itinerary = new ItineraryModel;
        $itinerary = $itinerary->get_all();
        $datas = [
            'itinerary' => $itinerary,
            'links' => '<link rel="stylesheet" href="public/css/newEvent.css">'
        ];
        return $this->display_back_vue('/back/newEvent.php', $datas);
    }

    public function new_event()
    {

        $rules = [
            'title' => ['required', 'min:10', 'max:50'],
            'date_' => ['required', 'format_date'],
            'itinerary' => ['required', 'int'],
            'content' => ['required']
        ];
        $validator = new Validator($_POST);
        $errors = $validator->validate($rules);
        $new_media = new MediaController;



        if (!empty($_FILES['media'])) {
            $return = $new_media->validate_media($_FILES['media']);

            if (!empty($return['file'])) {
                $errors += $return['file'];
            }
        } else {
            $errors['file'][] = 'Fichier au format image ou vidéo requis';
        }

        if (empty($errors)) {
            $errors = $new_media->register_media();
            if (empty($errors)) {
                $new_event = new Event($_POST);
                $event_model = new EventModel;
                $event_model->register_event($new_event->to_array());
                $_SESSION["message"] = "Evenement crée avec succes";
                header("location:?path=first_new_event");
            } else {
                $itinerary = new ItineraryModel;
                $itinerary = $itinerary->get_all();
                $datas = [
                    'itinerary' => $itinerary,
                    'errors' => $errors,
                    'links' => '<link rel="stylesheet" href="public/css/newEvent.css">'
                ];
                return $this->display_back_vue('/back/newEvent.php', $datas);
            }
        } else {
            $itinerary = new ItineraryModel;
            $itinerary = $itinerary->get_all();
            $datas = [
                'itinerary' => $itinerary,
                'errors' => $errors,
                'links' => '<link rel="stylesheet" href="public/css/newEvent.css">'
            ];
            return $this->display_back_vue('/back/newEvent.php', $datas);
        }
    }
}
