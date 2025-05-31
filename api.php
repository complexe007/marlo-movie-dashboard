<?php
// Fichier pour gérer les appels API vers les différents services

// Charger la configuration
$config = require_once 'config.php';

// Vérifier si le service est spécifié
if (!isset($_GET['service']) || !isset($_GET['endpoint'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Service ou endpoint non spécifié']);
    exit;
}

$service = $_GET['service'];
$endpoint = $_GET['endpoint'];

// Vérifier si le service existe dans la configuration
if (!isset($config['services'][$service])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Service inconnu']);
    exit;
}

$serviceConfig = $config['services'][$service];
$url = $serviceConfig['url'] . $endpoint;
$apiKey = $serviceConfig['api_key'];

// Ajouter la clé API si nécessaire
if (!empty($apiKey)) {
    $url .= (strpos($url, '?') !== false ? '&' : '?') . 'apikey=' . $apiKey;
}

// Effectuer la requête
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

// Si c'est une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    curl_setopt($ch, CURLOPT_POST, true);
    if (!empty($_POST)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
    }
}

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Retourner la réponse
header('Content-Type: application/json');
if ($response === false) {
    echo json_encode(['error' => 'Erreur de connexion au service']);
} else {
    http_response_code($httpCode);
    echo $response;
}
