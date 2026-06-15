<?php

namespace app\controller;


use app\class\Event;
use app\class\Validator;

use app\model\EventModel;
use app\model\EventCommModel;
use app\model\ItineraryModel;
use app\model\MediaModel;

use app\controller\AbstractController;
use app\controller\tools\MediaTools;

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
        $last_events = [];
        $other_events = [];
        $i = 0;
        $y = 0;

        foreach ($three_last as $last) {
            $i++;
            $last_id = $last->get("id");

            $media = new MediaModel();
            $media = $media->get_media_for($last_id);
            $last_events[$i]["media"] = $media[0]->get("path");
            $last_events[$i]["obj"] = $last;
        }
        $all_others = $event_model->last_events(9, 3);
        foreach ($all_others as $other) {
            $i++;
            $other_id = $other->get("id");

            $media = new MediaModel();
            $media = $media->get_media_for($other_id);
            $other_events[$i]["media"] = $media[0]->get("path");
            $other_events[$i]["obj"] = $other;
        }
        $datas = [
            "meta" => [
                "keywords" => "liste d'événements, événements Lorient",
                "description" => "Liste des événements proposé par l'association",
                "title" => "Liste des événements"
            ],
            "three_last" => $last_events,
            "all_others" => $other_events,
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
            "meta" => [
                "keywords" =>  $event->get('title'),
                "description" => $event->get('summary'),
                "title" => $event->get('title')
            ],
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
        $_SESSION['message'] = 'commentaire enregistré';
        header("location:?path=event_zoom&id=$id");
    }

    public function first_new_event()
    {
        $itinerary = new ItineraryModel;
        $itinerary = $itinerary->get_all();
        $datas = [
            'meta' => [
                'title' => "Création d'un événement"
            ],
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
        $new_media = new MediaTools;

        if (!empty($_FILES['media']['name'])) {
            $return = $new_media->validate_media($_FILES['media']);

            if (!empty($return['file'])) {
                $errors['file'] = $return['file'];
            }
        } else {
            $errors['file'][] = 'Fichier au format image ou vidéo requis';
        }

        if (empty($errors)) {  //si pas d'erreur tenter d'enregistrer tout
            $media_data = $new_media->prepare_media();

            $new_event = new Event($_POST);
            $event_model = new EventModel;
            // 2. Insert event + récupération ID
            $eventId = $event_model->register_event($new_event->to_array());

            // 3. Récupération ID media (à adapter selon ton MediaModel)
            $media_model = new MediaModel;
            $mediaId = $media_model->register_media($media_data); // ou via MediaTools si tu le stockes

            // 4. Liaison event ↔ media
            $event_model->link_media($eventId, $mediaId);

            // $event_model->register_event($new_event->to_array());


            $_SESSION["message"] = "Evenement crée avec succes";
            header("location:?path=first_new_event");
        } else {
            $itinerary = new ItineraryModel;
            $itinerary = $itinerary->get_all();

            $datas = [
                'meta' => [
                    'title' => "Création d'un événement"
                ],
                'itinerary' => $itinerary,
                'errors' => $errors,
                'links' => '<link rel="stylesheet" href="public/css/newEvent.css">'
            ];
            return $this->display_back_vue('/back/newEvent.php', $datas);
        }
    }
}
