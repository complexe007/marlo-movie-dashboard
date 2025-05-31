<?php
// Configuration de base
return [
    'site_title' => 'MARLO-MOVIE DASHBOARD',
    'year' => date('Y'),
    'version' => '1.0.0',
    
    // Configuration des services
    'services' => [
        'emby' => [
            'url' => 'http://localhost:8096', // À modifier selon votre configuration
            'api_key' => '', // À remplir avec votre clé API
            'name' => 'Emby',
            'description' => 'Serveur média',
            'icon' => 'server',
            'color' => 'green'
        ],
        'radarr' => [
            'url' => 'http://localhost:7878', // À modifier selon votre configuration
            'api_key' => '', // À remplir avec votre clé API
            'name' => 'Radarr',
            'description' => 'Gestion de films',
            'icon' => 'film',
            'color' => 'blue'
        ],
        'sonarr' => [
            'url' => 'http://localhost:8989', // À modifier selon votre configuration
            'api_key' => '', // À remplir avec votre clé API
            'name' => 'Sonarr',
            'description' => 'Gestion de séries',
            'icon' => 'tv',
            'color' => 'purple'
        ],
        'prowlarr' => [
            'url' => 'http://localhost:9696', // À modifier selon votre configuration
            'api_key' => '', // À remplir avec votre clé API
            'name' => 'Prowlarr',
            'description' => 'Gestion d\'indexeurs',
            'icon' => 'search',
            'color' => 'orange'
        ]
    ]
];
