<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'includes/functions.php';

// Initialiser la base de données
initDatabase();

// Configuration des applications (identique à votre code)
$apps = [
    'medias' => [
        'name' => 'Médias',
        'icon' => 'film',
        'items' => [
            [
                'name' => 'Emby',
                'url' => 'http://74.210.253.59:8096',
                'logo' => 'https://emby.media/resources/Logo-light-transparent-286x118.png',
                'color' => '#52B54B',
                'description' => 'Serveur média'
            ],
            [
                'name' => 'Radarr',
                'url' => 'http://74.210.253.59:7878',
                'logo' => 'https://raw.githubusercontent.com/Radarr/Radarr/develop/Logo/256.png',
                'color' => '#ffffff',
                'description' => 'Gestion de films'
            ],
            [
                'name' => 'Sonarr',
                'url' => 'http://74.210.253.59:8989',
                'logo' => 'https://raw.githubusercontent.com/Sonarr/Sonarr/develop/Logo/256.png',
                'color' => '#ffffff',
                'description' => 'Gestion de séries'
            ],
            [
                'name' => 'Prowlarr',
                'url' => 'http://74.210.253.59:9696',
                'logo' => 'https://raw.githubusercontent.com/Prowlarr/Prowlarr/develop/Logo/256.png',
                'color' => '#ffffff',
                'description' => 'Gestion d\'indexeurs'
            ]
        ]
    ],
    'serveurs' => [
        'name' => 'Serveurs',
        'icon' => 'server',
        'items' => [
            [
                'name' => 'Portainer',
                'url' => 'http://74.210.253.59:9000',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/portainer.svg',
                'color' => '#13BEF9',
                'description' => 'Gestion Docker'
            ],
            [
                'name' => 'Transmission',
                'url' => 'http://74.210.253.59:9091',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/6/6d/Transmission_icon.png',
                'color' => '#ffffff',
                'description' => 'Client BitTorrent'
            ],
            [
                'name' => 'Synology',
                'url' => 'http://74.210.253.59:5000',
                'logo' => 'https://global.download.synology.com/download/Package/img/Docker/1.11.2-0270/thumb_256.png',
                'color' => '#ffffff',
                'description' => 'NAS'
            ],
            [
                'name' => 'Tautulli',
                'url' => 'http://74.210.253.59:8181',
                'logo' => 'https://tautulli.com/images/logo-circle.png',
                'color' => '#ffffff',
                'description' => 'Statistiques Plex'
            ]
        ]
    ],
    'iptv' => [
        'name' => 'IPTV & TV',
        'icon' => 'tv',
        'items' => [
            [
                'name' => 'Edge',
                'url' => 'http://login.edge.bz:2095/login.php?referrer=/reseller.php',
                'icon' => 'tv',
                'color' => '#4CAF50',
                'description' => 'Fournisseur IPTV'
            ],
            [
                'name' => 'Diablo',
                'url' => 'http://e-billing.diablo-pro.com/login',
                'icon' => 'tv',
                'color' => '#FF5722',
                'description' => 'Fournisseur IPTV'
            ],
            [
                'name' => 'Raccoon',
                'url' => 'http://raccoon.bz:2095/gDxTgDUM/',
                'icon' => 'tv',
                'color' => '#607D8B',
                'description' => 'Fournisseur IPTV'
            ],
            [
                'name' => 'Resotik',
                'url' => 'https://tv.resotik.ca/revendeur/login?referrer=logout',
                'icon' => 'tv',
                'color' => '#3F51B5',
                'description' => 'Fournisseur IPTV'
            ],
            [
                'name' => 'Radio',
                'url' => 'https://marlo-movie.com/media/',
                'icon' => 'broadcast-tower',
                'color' => '#9C27B0',
                'description' => 'Écouter la radio'
            ],
            [
                'name' => 'NeoStream',
                'url' => 'https://marlo-movie.com/cooltv/',
                'icon' => 'play-circle',
                'color' => '#2196F3',
                'description' => 'Streaming TV'
            ],
            [
                'name' => 'TV Canada',
                'url' => 'https://marlo-movie.com/canada/',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Canada_%28Pantone%29.svg/1200px-Flag_of_Canada_%28Pantone%29.svg.png',
                'color' => '#F44336',
                'description' => 'TV canadienne'
            ],
            [
                'name' => 'TV Canada 2',
                'url' => 'https://marlo-movie.com/iptv/',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Canada_%28Pantone%29.svg/1200px-Flag_of_Canada_%28Pantone%29.svg.png',
                'color' => '#F44336',
                'description' => 'TV canadienne'
            ]
        ]
    ],
    'sites_pratiques' => [
        'name' => 'Sites pratiques',
        'icon' => 'globe',
        'items' => [
            [
                'name' => 'TMDB',
                'url' => 'https://www.themoviedb.org/',
                'logo' => 'https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_2-d537fb228cf3ded904ef09b136fe3fec72548ebc1fea3fbbd1ad9e36364db38b.svg',
                'color' => '#01D277',
                'description' => 'Base de données de films'
            ],
            [
                'name' => 'Installer TiviMate',
                'url' => 'https://sosreparation.net/app/',
                'icon' => 'download',
                'color' => '#FF9800',
                'description' => 'Guide d\'installation'
            ],
            [
                'name' => 'TiviMate Code',
                'url' => 'https://iptv-qc.com/tivimate-firestick-firetv/',
                'icon' => 'key',
                'color' => '#FF9800',
                'description' => 'Codes d\'activation'
            ],
            [
                'name' => 'Rutorrent',
                'url' => 'https://complexe.dark.seedhost.eu/rutorrent/',
                'logo' => 'https://github.com/Novik/ruTorrent/raw/master/images/logo.png',
                'color' => '#388E3C',
                'description' => 'Client torrent'
            ],
            [
                'name' => 'Proton Mail',
                'url' => 'https://account.proton.me/login',
                'logo' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-SHSsZh2liDqTg651joCL0pBVz2pfzp.png',
                'color' => '#8E24AA',
                'description' => 'Email sécurisé'
            ],
            [
                'name' => 'SmartTube',
                'url' => 'https://troypoint.com/smarttube/',
                'logo' => 'https://github.com/yuliskov/SmartTubeNext/raw/master/smarttubetv/src/main/res/mipmap-xxxhdpi/ic_launcher.png',
                'color' => '#FF0000',
                'description' => 'Alternative YouTube'
            ],
            [
                'name' => 'Ferme Lufa',
                'url' => 'https://montreal.lufa.com/fr/marche',
                'logo' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-AUBj9YIMcoDbxVXd9XMq8Mqyyt4NUb.png',
                'color' => '#4CAF50',
                'description' => 'Produits fermiers'
            ],
            [
                'name' => 'Google Traduction',
                'url' => 'http://translate.google.com/',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/d/db/Google_Translate_Icon.png',
                'color' => '#4285F4',
                'description' => 'Traduction en ligne'
            ],
            [
                'name' => 'Mes domaines',
                'url' => 'https://cp.zoneedit.com/login.php/',
                'icon' => 'globe',
                'color' => '#607D8B',
                'description' => 'Gestion de domaines'
            ],
            [
                'name' => 'cPanel',
                'url' => 'https://cpanel3.easyweb.com:2083/',
                'logo' => 'https://cpanel.net/wp-content/themes/cPbase/assets/img/logos/cp-logo.svg',
                'color' => '#FF6C2C',
                'description' => 'Gestion d\'hébergement'
            ]
        ]
    ],
    'banque' => [
        'name' => 'Banque & Paiements',
        'icon' => 'credit-card',
        'items' => [
            [
                'name' => 'PayPal',
                'url' => 'https://www.paypal.com/signin',
                'logo' => 'https://www.paypalobjects.com/webstatic/icon/pp258.png',
                'color' => '#003087',
                'description' => 'Paiements en ligne'
            ],
            [
                'name' => 'Fizz',
                'url' => 'https://fizz.ca/fr',
                'logo' => 'https://styles.redditmedia.com/t5_pfbj4/styles/communityIcon_efu9qf2ekqp21.jpg?format=pjpg&s=f262fbccd93dc6cae3032fd85ae873f062a6cd6d',
                'color' => '#00884a',
                'description' => 'Services mobile'
            ],
            [
                'name' => 'Telus',
                'url' => 'https://www.telus.com/',
                'logo' => 'https://www.telus.com/content/dam/telus-images/brand/telus-logo.svg',
                'color' => '#6ad400',
                'description' => 'Services mobile'
            ],
            [
                'name' => 'RBC Banque',
                'url' => 'https://www.rbcbanqueroyale.com/fr/',
                'logo' => 'https://www.rbcroyalbank.com/dvl/v1.0/assets/images/logos/rbc-logo-shield.svg',
                'color' => '#0051a5',
                'description' => 'Services bancaires'
            ],
            [
                'name' => 'Banque EQ',
                'url' => 'https://secure.eqbank.ca/login',
                'logo' => 'https://secure.eqbank.ca/assets/images/fr/eq-logo-small.png',
                'color' => '#FFFF00',
                'description' => 'Paiements en ligne'
            ]
        ]
    ],
    'status_emby' => [
        'name' => 'Status Emby',
        'icon' => 'chart-line',
        'redirect' => 'https://marlo-movie.com/groupe',
        'items' => []
    ],
    'outils' => [
        'name' => 'Outils',
        'icon' => 'tools',
        'items' => [
            [
                'name' => 'Speedtest',
                'url' => 'https://speedtest.net',
                'logo' => 'https://www.speedtest.net/s/images/ookla-logo-black-text.svg',
                'color' => '#141526',
                'description' => 'Test de vitesse'
            ],
            [
                'name' => 'IP Checker',
                'url' => 'https://whatismyipaddress.com',
                'icon' => 'network-wired',
                'color' => '#4CAF50',
                'description' => 'Vérification IP'
            ],
            [
                'name' => 'DNS Checker',
                'url' => 'https://dnschecker.org',
                'icon' => 'sitemap',
                'color' => '#2196F3',
                'description' => 'Vérification DNS'
            ],
            [
                'name' => 'Down Detector',
                'url' => 'https://downdetector.com',
                'icon' => 'exclamation-triangle',
                'color' => '#FF9800',
                'description' => 'Statut des services'
            ]
        ]
    ]
];

// Récupérer l'onglet actif
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'medias';
if (!array_key_exists($activeTab, $apps)) {
    $activeTab = 'medias';
}

// Vérifier si l'onglet actif a une redirection
if (isset($apps[$activeTab]['redirect'])) {
    header('Location: ' . $apps[$activeTab]['redirect']);
    exit;
}

// Vérifier le statut des services pour l'onglet actuel
$serviceStatuses = [];
foreach ($apps[$activeTab]['items'] as $app) {
    $serviceStatuses[$app['name']] = checkServiceStatus($app['url']);
}

// Fonction pour générer une couleur aléatoire si aucune n'est spécifiée
function getRandomColor() {
    $colors = ['#4CAF50', '#2196F3', '#FF5722', '#9C27B0', '#607D8B', '#FF9800', '#795548', '#3F51B5', '#009688'];
    return $colors[array_rand($colors)];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marlo-Movie Dashboard</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.php">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1><i class="fas fa-film"></i> Marlo-Movie Dashboard</h1>
    </header>
    
    <nav class="nav">
        <a href="https://marlo-movie.com/galerie" class="nav-item demande-btn" target="_blank">
            <i class="fas fa-images"></i> Galleri photo 
        </a>
         
        <?php foreach ($apps as $tabId => $tabData): ?>
            <?php if ($tabId === 'status_emby'): ?>
                <a href="<?php echo $tabData['redirect']; ?>" class="nav-item" target="_blank">
                    <i class="fas fa-<?php echo $tabData['icon']; ?>"></i>
                    <?php echo $tabData['name']; ?>
                </a>
            <?php else: ?>
                <a href="?tab=<?php echo $tabId; ?>" class="nav-item <?php echo $tabId === $activeTab ? 'active' : ''; ?>">
                    <i class="fas fa-<?php echo $tabData['icon']; ?>"></i>
                    <?php echo $tabData['name']; ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
        
        <a href="statistics.php" class="nav-item">
            <i class="fas fa-chart-bar"></i> Statistiques
        </a>
        
        <a href="https://iptv.marlo-movie.com" class="nav-item demande-btn" target="_blank">
            <i class="fas fa-tv"></i> Demande
        </a>
    </nav>
    
    <main class="main-content">
        <div class="search-container">
            <input type="text" class="search-input" id="searchInput" placeholder="Rechercher une application...">
            <i class="fas fa-search search-icon"></i>
        </div>
        
        <!-- Statut global des services -->
        <div class="status-overview">
            <?php
            $onlineCount = 0;
            $totalCount = count($apps[$activeTab]['items']);
            foreach ($serviceStatuses as $status) {
                if ($status['online']) $onlineCount++;
            }
            ?>
            <div class="status-card">
                <i class="fas fa-server"></i>
                <span><?php echo $onlineCount; ?>/<?php echo $totalCount; ?> services en ligne</span>
                <div class="status-bar">
                    <div class="status-fill" style="width: <?php echo ($totalCount > 0) ? ($onlineCount / $totalCount) * 100 : 0; ?>%"></div>
                </div>
            </div>
        </div>
        
        <div class="apps-grid" id="appsGrid">
            <?php foreach ($apps[$activeTab]['items'] as $app): ?>
                <?php $status = $serviceStatuses[$app['name']]; ?>
                <div class="app-card <?php echo $status['online'] ? 'online' : 'offline'; ?>" 
                     data-name="<?php echo strtolower($app['name']); ?>" 
                     data-description="<?php echo strtolower($app['description']); ?>"
                     data-url="<?php echo $app['url']; ?>"
                     data-app-name="<?php echo $app['name']; ?>">
                     
                    <!-- Indicateur de statut -->
                    <div class="status-indicator">
                        <i class="fas fa-circle <?php echo $status['online'] ? 'status-online' : 'status-offline'; ?>"></i>
                        <span class="status-text"><?php echo $status['online'] ? 'En ligne' : 'Hors ligne'; ?></span>
                        <?php if ($status['online'] && $status['response_time']): ?>
                            <span class="response-time"><?php echo $status['response_time']; ?>ms</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="app-icon" style="background-color: <?php echo $app['color'] ?? getRandomColor(); ?>">
                        <?php if (isset($app['logo'])): ?>
                            <img src="<?php echo $app['logo']; ?>" alt="<?php echo $app['name']; ?> logo" loading="lazy">
                        <?php else: ?>
                            <i class="fas fa-<?php echo $app['icon']; ?>" style="color: white;"></i>
                        <?php endif; ?>
                    </div>
                    <div class="app-info">
                        <div class="app-name"><?php echo $app['name']; ?></div>
                        <div class="app-description"><?php echo $app['description']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    
    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> Marlo-Movie Dashboard</p>
    </footer>
    
    <script src="assets/js/script.js"></script>
</body>
</html>
