<?php

/*----- contient l'ensemble des routes de l'application -----*/

const ROUTES = [
    'accueil' => [
        'controller' => App\controller\AccueilController::class,
        'method' => 'main',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/']
        ]
    ],

    'asso' => [
        'controller' => App\controller\StaticController::class,
        'method' => 'asso'
    ],

    'event_list' => [
        'controller' => App\controller\EventController::class,
        'method' => 'event_list_page',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label'=>'Evenements','url'=>'/evenements']
        ]
    ],

    'event_zoom' =>  [
        'controller' => App\controller\EventController::class,
        'method' => 'event_zoom_page',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label'=>'Evenements','url'=>'/evenements'],
            ['label'=>'Plus d\'infos','url'=>'/plus d\'infos']
        ]
    ],

    'first_new_event' =>[
        'controller' => App\controller\EventController::class,
        'method' => 'first_new_event'
    ],

    'new_event' =>[
        'controller' => App\controller\EventController::class,
        'method' => 'new_event'
    ],

    'comment_event' => [
        'controller' => App\controller\EventController::class,
        'method' => 'comment'
    ],

    'itinerary_list' => [
        'controller' => App\controller\ItineraryController::class,
        'method' => 'itin_list_page',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label'=>'Itinéraires','url'=>'/itinéraires']
        ]
    ],

    'itinerary_zoom' => [
        'controller' => App\controller\ItineraryController::class,
        'method' => 'itin_zoom_page',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label'=>'Itinéraires','url'=>'/itinéraires'],
            ['label'=>'Plus d\'infos','url'=>'/plus d\'infos']
        ]
    ],

    'first_new_itinerary' =>[
        'controller' => App\controller\ItineraryController::class,
        'method' => 'first_new_itinerary'
    ],

    'new_itinerary' =>[
        'controller' => App\controller\ItineraryController::class,
        'method' => 'new_itinerary'
    ],

    'comment_itinerary' => [
        'controller' => App\controller\ItineraryController::class,
        'method' => 'comment_itinerary'
    ],

    'first_contacts' => [
        'controller' => App\controller\ContactsController::class,
        'method' => 'first_contact_page'
    ],

    'contacts' => [
        'controller' => App\controller\ContactsController::class,
        'method' => 'contact_page'
    ],

    'first_login' => [
        'controller' => App\controller\UserController::class,
        'method' => 'first_login_form',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label'=>'Connection','url'=>'/connection']
        ]
    ],

    'login' => [
        'controller' => App\controller\UserController::class,
        'method' => 'login_form',
        'title' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label'=>'Connection','url'=>'/connection']
        ]
    ],

    'account' => [
        'controller' => App\controller\UserController::class,
        'method' => 'my_account',
        'title' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label'=>'Mon compte','url'=>'/mon compte']
        ]
    ],

    'logout' => [
        'controller' => App\controller\UserController::class,
        'method' => 'logout',
    ],

    'first_register' => [
        'controller' => App\controller\UserController::class,
        'method' => 'first_register_form',
        'title' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label'=>'Connection','url'=>'/connection'],
            ['label'=>'Créer un compte','url'=>'/créer un compte']
        ]
    ],
    
    'register' => [
        'controller' => App\controller\UserController::class,
        'method' => 'register_form',
        'title' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label'=>'Connection','url'=>'/connection'],
            ['label'=>'Créer un compte','url'=>'/créer un compte']
        ]
    ],

    'backoffice'=>[
        'controller' => App\controller\UserController::class,
        'method' => 'first_backoffice'
    ],

    'login_backoffice'=>[
        'controller' => App\controller\UserController::class,
        'method' => 'login_backoffice'
    ],

    'backoffice_accueil' => [
        'controller' => App\controller\AccueilController::class,
        'method' => 'backoffice_accueil'
    ],

    'logout_back' => [
        'controller' => App\controller\UserController::class,
        'method' => 'logout_back'
    ],

    
];
