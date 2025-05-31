<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'includes/functions.php';

header('Content-Type: application/json');

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $status = checkServiceStatus($url);
    echo json_encode($status);
} else {
    echo json_encode(['error' => 'URL manquante']);
}
?>
