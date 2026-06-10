<?php

/*----- contient l'ensemble des routes de l'application -----*/

const ROUTES = [
    'accueil' => [
        'controller' => app\controller\AccueilController::class,
        'method' => 'main',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/']
        ]
    ],

    'asso' => [
        'controller' => app\controller\StaticController::class,
        'method' => 'asso',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'L\'association', 'url' => '/association']
        ]
    ],

    'event_list' => [
        'controller' => app\controller\EventController::class,
        'method' => 'event_list_page',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Evenements', 'url' => '/evenements']
        ]
    ],

    'event_zoom' =>  [
        'controller' => app\controller\EventController::class,
        'method' => 'event_zoom_page',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Evenements', 'url' => '/evenements'],
            ['label' => 'Plus d\'infos', 'url' => '/plus d\'infos']
        ]
    ],

    'first_new_event' => [
        'controller' => app\controller\EventController::class,
        'method' => 'first_new_event',
        'roles' => [2, 3]
    ],

    'new_event' => [
        'controller' => app\controller\EventController::class,
        'method' => 'new_event',
        'roles' => [2, 3]
    ],

    'comment_event' => [
        'controller' => app\controller\EventController::class,
        'method' => 'comment',
        'roles' => [1, 2, 3]
    ],

    'itinerary_list' => [
        'controller' => app\controller\ItineraryController::class,
        'method' => 'itin_list_page',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Itinéraires', 'url' => '/itinéraires']
        ]
    ],

    'itinerary_zoom' => [
        'controller' => app\controller\ItineraryController::class,
        'method' => 'itin_zoom_page',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Itinéraires', 'url' => '/itinéraires'],
            ['label' => 'Plus d\'infos', 'url' => '/plus d\'infos']
        ]
    ],

    'first_new_itinerary' => [
        'controller' => app\controller\ItineraryController::class,
        'method' => 'first_new_itinerary',
        'roles' => [2, 3]
    ],

    'new_itinerary' => [
        'controller' => app\controller\ItineraryController::class,
        'method' => 'new_itinerary',
        'roles' => [2, 3]
    ],

    'comment_itinerary' => [
        'controller' => app\controller\ItineraryController::class,
        'method' => 'comment_itinerary',
        'roles' => [1, 2, 3]
    ],

    // 'first_contacts' => [
    //     'controller' => app\controller\ContactsController::class,
    //     'method' => 'first_contact_page',
    //     'breadcrumb' => [
    //         ['label' => 'Accueil', 'url' => '/'],
    //         ['label' => 'Nous contacter', 'url' => '/nous contacter']
    //     ]
    // ],

    // 'contacts' => [
    //     'controller' => app\controller\ContactsController::class,
    //     'method' => 'contact_page'
    // ],

    'first_contact_form' => [
        'controller' => app\controller\ContactsController::class,
        'method' => 'first_contact_form',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Nous contacter', 'url' => '/nous contacter']
        ]
    ],

    'contact_form' => [
        'controller' => app\controller\ContactsController::class,
        'method' => 'contact_form',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Nous contacter', 'url' => '/nous contacter']
        ]
    ],

    'first_login' => [
        'controller' => app\controller\UserController::class,
        'method' => 'first_login_form',
        'breadcrumb' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Connection', 'url' => '/connection']
        ]
    ],

    'login' => [
        'controller' => app\controller\UserController::class,
        'method' => 'login_form',
        'title' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Connection', 'url' => '/connection']
        ]
    ],

    'account' => [
        'controller' => app\controller\UserController::class,
        'method' => 'my_account',
        'title' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Mon compte', 'url' => '/mon compte']
        ]
    ],

    'logout' => [
        'controller' => app\controller\UserController::class,
        'method' => 'logout',
    ],

    'first_register' => [
        'controller' => app\controller\UserController::class,
        'method' => 'first_register_form',
        'title' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Connection', 'url' => '/connection'],
            ['label' => 'Créer un compte', 'url' => '/créer un compte']
        ]
    ],

    'register' => [
        'controller' => app\controller\UserController::class,
        'method' => 'register_form',
        'title' => [
            ['label' => 'Accueil', 'url' => '/'],
            ['label' => 'Connection', 'url' => '/connection'],
            ['label' => 'Créer un compte', 'url' => '/créer un compte']
        ]
    ],

    

    'backoffice' => [
        'controller' => app\controller\UserController::class,
        'method' => 'first_backoffice'
    ],

    'login_backoffice' => [
        'controller' => app\controller\UserController::class,
        'method' => 'login_backoffice'
    ],

    'backoffice_accueil' => [
        'controller' => app\controller\AccueilController::class,
        'method' => 'backoffice_accueil',
        'roles' => [2, 3]
    ],

    'logout_back' => [
        'controller' => app\controller\UserController::class,
        'method' => 'logout_back'
    ],

    'delete_account' => [
        'controller' => app\controller\UserController::class,
        'method' => 'delete_account'
    ],

    'get_commentarys' => [
        'controller' => app\controller\AdminController::class,
        'method' => 'get_commentarys',
        'roles' => [3]
    ],

    'get_all_users' => [
        'controller' => app\controller\AdminController::class,
        'method' => 'get_all_users',
        'roles' => [3]
    ],

    'search_users' => [
        'controller' => app\controller\AdminController::class,
        'method' => 'search_users',
        'roles' => [3]
    ],

    'role_organizer' => [
        'controller' => app\controller\AdminController::class,
        'method' => 'role_organizer',
        'roles' => [3]
    ],

    'role_user' => [
        'controller' => app\controller\AdminController::class,
        'method' => 'role_user',
        'roles' => [3]
    ]
];
