<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/centre' => [[['_route' => 'app_api_centre_index', '_controller' => 'App\\Controller\\Api\\CentreController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/demande' => [
            [['_route' => 'app_api_demande_index', '_controller' => 'App\\Controller\\Api\\DemandeController::index'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_api_demande_create', '_controller' => 'App\\Controller\\Api\\DemandeController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/region' => [[['_route' => 'app_api_region_index', '_controller' => 'App\\Controller\\Api\\RegionController::index'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
