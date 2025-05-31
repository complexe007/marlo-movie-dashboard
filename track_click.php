<?php
require_once 'includes/config.php';
require_once 'includes/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    $appName = $input['app_name'] ?? '';
    $appUrl = $input['app_url'] ?? '';
    $category = $input['category'] ?? '';
    
    if ($appName && $appUrl && $category) {
        $success = logUsage($appName, $appUrl, $category);
        echo json_encode(['success' => $success]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Données manquantes']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Méthode non autorisée']);
}
?>
