<?php
if(isset($_POST["submit"])) {
    if (empty($_FILES["image"]["name"])) {
        header("Location: index.php");
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]); // uploads/dua.jpg

    if (file_exists($target_file)) {
        echo "Sorry, file already exists." . "<br> <a href='index.php'>Go back</a>";
        exit;
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";

        $thumbnailPath = "thumbnails/" . basename($_FILES["image"]["name"]);
        $thumbnailWidth = 100;
        $thumbnailHeight = 70;

        list($width, $height) = getimagesize($target_file);

        $thumb = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);
        $source = imagecreatefromjpeg($target_file);

        imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, $width, $height);
        imagejpeg($thumb, $thumbnailPath, 100);

        echo "<br> <h2>Original Image</h2> <img src='$target_file' alt='Original Image'>";
        echo "<br> <h2>Thumbnail</h2> <img src='$thumbnailPath' alt='Thumbnail'>";

    } else {
        echo "Sorry, there was an error uploading your file." . "<br> <a href='index.php'>Go back</a>";
    }
}
