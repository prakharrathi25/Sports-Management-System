<?php
    // Making a server connection
    $server = "localhost";
    $username = "root";
    $password = "mysql@123";
    $dbname = "sports-database";
    $conn = mysqli_connect($server, $username, $password, $dbname);

    if ($conn->connect_errno) {
        die("Failed to connect to MySQL: " . $$conn->connect_error);
    }
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
        <div class="row">
            <!-- Displaying all of our filters -->
            <div class="col-lg-3">
            <h5>Player Filters</h5>
            <hr>

            <!-- DISPLAYING TEAM OPTIONS -->
            <h6 class="text-info">Select Team</h6>
            <ul class="list-group">
                <!-- Getting unique team value for our teams -->
                <?php
                    $team_sql = "SELECT teamName FROM teamDetails ORDER BY teamName LIMIT 4";
                    $result=mysqli_query($conn, $team_sql) or die(mysqli_error($conn));

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
            <br>

            <!-- DISPLAYING Gender options -->
            <h6 class="text-info">Select Sport</h6>
            <ul class="list-group">
                <!-- Getting unique team value for our teams -->
                <?php
                    $team_sql = "SELECT DISTINCT Gender FROM playerDetails ORDER BY Gender";
                    $result=mysqli_query($conn, $team_sql) or die(mysqli_error($conn));

                    // Display results in a while loop
                    while($row=$result->fetch_assoc()){
                ?>
                <li class="list-group-item">
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="checkbox" class="form-check-input product-check" name="" value="<?= $row['Gender']; ?>" id="brand"> <?= $row['Gender']; ?>
                        </label>
                    </div>
                </li>
            <?php } ?>
            </ul>
            <br>

            <!-- DISPLAYING Sport OPTIONS -->
            <h6 class="text-info">Select Sport</h6>
            <ul class="list-group">
                <!-- Getting unique team value for our teams -->
                <?php
                    $team_sql = "SELECT sName FROM sportDetails ORDER BY sName";
                    $result=mysqli_query($conn, $team_sql) or die(mysqli_error($conn));

                    // Display results in a while loop
                    while($row=$result->fetch_assoc()){
                ?>
                <li class="list-group-item">
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="checkbox" class="form-check-input product-check" name="" value="<?= $row['sName']; ?>" id="brand"> <?= $row['sName']; ?>
                        </label>
                    </div>
                </li>
            <?php } ?>
            </ul>

            <!-- DISPLAYING Department OPTIONS -->
            <h6 class="text-info">Select Depatment</h6>
            <ul class="list-group">
                <!-- Getting unique team value for our teams -->
                <?php
                    $team_sql = "SELECT dept FROM academic ORDER BY dept";
                    $result=mysqli_query($conn, $team_sql) or die(mysqli_error($conn));

                    // Display results in a while loop
                    while($row=$result->fetch_assoc()){
                ?>
                <li class="list-group-item">
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="checkbox" class="form-check-input product-check" name="" value="<?= $row['dept']; ?>" id="brand"> <?= $row['dept']; ?>
                        </label>
                    </div>
                </li>
            <?php } ?>
            </ul>
            <br>

            <!-- DISPLAYING Department OPTIONS -->
            <h6 class="text-info">Select Level of Study</h6>
            <ul class="list-group">
                <!-- Getting unique team value for our teams -->
                <?php
                    $team_sql = "SELECT DISTINCT level FROM academic ORDER BY level";
                    $result=mysqli_query($conn, $team_sql) or die(mysqli_error($conn));

                    // Display results in a while loop
                    while($row=$result->fetch_assoc()){
                ?>
                <li class="list-group-item">
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="checkbox" class="form-check-input product-check" name="" value="<?= $row['level']; ?>" id="brand"> <?= $row['level']; ?>
                        </label>
                    </div>
                </li>
            <?php } ?>
            </ul>

        </div>

            <!---- Fetching and diplaying the players  -->
            <div class="col-lg-9">
                <h5 class="text-center" id="textChange">All Players</h5>
                <hr>
                <!-- Made a loader and displayed it through AJAX  -->
                <div class="text-center">
                    <img src="assets/images/loader.gif" id="loader" alt="" width="200" style="display:none;">
                </div>
                <div class="row" id="result">
                    <?php
                        $sql = "SELECT p.pname, p.picture, t.teamName FROM playerDetails as p, teamDetails as t WHERE t.tid = p.teamID";
                        $result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = $result->fetch_assoc()){
                    ?>
                    <div class="col-md-3 mb-2">
                        <div class="card-deck">
                            <div class="card border-secondary">
                                <img src="<?= $row['picture']; ?>" class="card-img-top">
                                <div class="card-img-overlay">
                                    <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1"><?= $row['pname']; ?></h6>
                                </div>
                                <!-- Body of the content  -->
                                <div class="card-body">
                                    <h4 class="card-title text-danger"><?= $row['teamName']; ?></h4>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
