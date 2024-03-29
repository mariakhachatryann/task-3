<?php

class ImageController
{
    public function index()
    {
        require_once 'views/index.php';
    }

    public function manipulate()
    {

        if (isset($_POST['submit'])) {
            $imageModel = new ImageModel();
            $result = $imageModel->uploadImage($_FILES['image']);

            if ($result === false) {
                header('Location: index.php?action=');
            } elseif (is_array($result)) {
                require_once 'views/upload.php';
            }
        }
    }
}