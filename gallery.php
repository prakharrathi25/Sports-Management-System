<?php
    include 'dbh.php';
    $_SESSION['username'] = "manager";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery Design</title>
    <link rel="stylesheet" href="./assets/css/gallery.css">
    <link rel="stylesheet" href="./assets/css/lightbox.min.css">
    <script src="./assets/js/lightbox-plus-jquery.min.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Space......</a></li>
        </ul>
    </nav>

<h1>SNUSL Image Gallery</h1>
<div class="container">
    <?php
        $sql = "SELECT * from gallery";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while($row = $result->fetch_assoc()){
    ?>
    <div class="gallery">
        <a href="<?= $row['location'] ?>" data-lightbox="mygallery"><img src="<?= $row['location'] ?>"></a>
        <div class="desc"> <?= $row['title'] ?></div>
    </div>
    <?php } ?>

</div>

<!--- Upload Button (Show when logged in) -->
<?php
    if (isset($_SESSION['username'])) {
        echo '<div class="gallery-upload">
            <form action="gallery_upload.html">
                <input type="submit" class="form-control submit" value="Upload Photo">
            </form>
        </div>';
    }

?>

</body>
</html>
