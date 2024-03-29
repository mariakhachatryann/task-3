<?php
require_once 'controllers/ImageController.php';
require_once 'models/ImageModel.php';

$action = $_GET['action'] ?? null;
switch ($action) {
    case 'upload':
        $controller = new ImageController();
        $controller->manipulate();
    break;
    default:
        $controller = new ImageController();
        $controller->index();
    break;
}