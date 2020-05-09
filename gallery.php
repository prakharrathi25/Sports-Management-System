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
    <link rel="stylesheet" href="assets/css/gallery.css">
    <link rel="stylesheet" href="assets/css/lightbox.min.css">
    <script src="./assets/js/lightbox-plus-jquery.min.js"></script>
</head>
<body>
    <nav>
        <ul>
            <!-- NAVBAR SPACE -->
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
<style media="screen">
body{
    margin: 0;
    padding: center;
    text-align: center;
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(assets/images/roger_federer-2560x1440.jpg);
    background-size: cover;
    font-family: sans-serif;
}
</style>

<?php $conn -> close(); ?>
</body>

</html>
