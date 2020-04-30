<?php
    // Making a server connection
    // $server = "localhost";
    // $username = "root";
    // $password = "mysql@123";
    // $dbname = "sports-database";
    // $conn = mysqli_connect($server, $username, $password, $dbname);
    //
    // if ($conn->connect_errno) {
    //     die("Failed to connect to MySQL: " . $$conn->connect_error);
    // }
    $connect = new PDO("mysql:host=localhost; dbname=testing", "root", "mysql@123")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Player</title>
  </head>
  <body>
    <h3 class="text-center text-light bg-info"> Displaying all players</h3>
    <div class="container-fluid">
        <div class="col-lg-3">
            <h5>Filter Product</h5>
            <hr>
            <h6 class="text-info">Select Team</h6>
            <ul class="list-group">
                <!-- Getting unique team value for our teams -->
                <? php
                    $team_sql = "SELECT teamName FROM teamDetails ORDER BY teamName LIMIT 4";
                    $result=mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    // Display results in a while loop
                    while($row=$result->fetch_assoc()){
                ?>
                <li class="list-group-item">
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="checkbox" class="form-check-input product-check" name="" value="<?= $row['teamName']; ?>" id="brand"> <?= $row['teamName']; ?>
                        </label>
                    </div>
                </li>
            <?php } ?>
            </ul>
        </div>
        <div class="col-lg-9">

        </div >
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
