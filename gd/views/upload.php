<div>
    <?php if (isset($result['message'])): ?>
        <p><?= $result["message"]; ?></p>
        <a href="index.php?action=">Go back</a>
    <?php else : ?>
        <p>The file  <?= htmlspecialchars(basename($_FILES["image"]["name"])) ?> has been uploaded. </p>
        <h2>Original Image</h2>
        <img src="<?php echo $result['original']; ?>" alt="Original Image"><br>
        <h2>Thumbnail</h2>
        <img src="<?php echo $result['thumbnail']; ?>" alt="Thumbnail"><br>
    <?php endif; ?>
</div>
