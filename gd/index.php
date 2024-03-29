<?php
require_once "controllers/ImageController.php";
require_once "models/ImageModel.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'upload':
            $controller = new ImageController();
            $controller->manipulate();
            break;
        default:
            $controller = new ImageController();
            $controller->index();
            exit;
    }
}