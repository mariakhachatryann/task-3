<?php

class ImageModel
{
    public function uploadImage($file)
    {
        if (empty($file['name'])) {
            return false;
        }

        $target_dir = 'uploads/';
        $target_file = $target_dir . basename($file['name']);

        if (file_exists($target_file)) {
            return ['message' => 'Sorry, file already exists.'];
        }

        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $thumbnailPath = 'thumbnails/' . basename($file['name']);
            $thumbnailWidth = 100;
            $thumbnailHeight = 70;

            list($width, $height) = getimagesize($target_file);

            $thumb = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);
            $source = imagecreatefromjpeg($target_file);

            imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, $width, $height);
            imagejpeg($thumb, $thumbnailPath, 100);

            return [
                'original' => $target_file,
                'thumbnail' => $thumbnailPath
            ];
        } else {
            return ['message' => 'Sorry, there was an error uploading your file.'];
        }
    }
}

