<?php
    // Making a server connection
    $server = "localhost";
    $username = "root";
    $password = "mysql@123";  // prakhar = mysql@123
    $dbname = "sports-database";
    $conn = mysqli_connect($server, $username, $password, $dbname);

    if ($conn->connect_errno) {
        die("Failed to connect to MySQL: " . $$conn->connect_error);
    }

    // Get Event Details
    $page_id = $_GET['id'];
    $sql = "SELECT * FROM events WHERE eventID= '$page_id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = $result->fetch_assoc();
    // Collecting Team IDs in advance
    $team1_id = $row['team1'];
    $team2_id = $row['team2'];
    $sport_id = $row['sport'];
    $result->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Team Display</title>
  </head>
  <body>
    <!-- <h3 class="text-center text-light bg-info"> Displaying all players</h3> -->
    <!-- NAVBAR AND HEADER -->
    <div class="col-lg-12">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="https://snu.edu.in/" style="width: max-content;"><img
                    src="assets\images\snu_logo.jpg" class="img-fluid" style="width: max-content;"
                    alt="Responsive image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" id="header1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            <h1> Home </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="allevents.php">
                            <h1> Events </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="NewsWall\B\Bootstrap.html">
                            <h1> News </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="all_players.php">
                            <h1> Players </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="about.html">
                            <h1> SNUSL </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="gallery.php">
                            <h1> Gallery </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="calendar\calendar.php">
                            <h1> Calendar </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <div class="dropdown" style="float:right; margin-right: 125px; margin-top: 20px; margin-left: 600px;">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login:<span class="glyphicon glyphicon-user"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="login.php">player/Manager Login</a>
                        </div>
                    </div>
                </ul>
        </nav>
    </div>
    <!--- Dislay starts -->
    <div class="container-fluid">
        <div class="row">

            <!-- Displaying Team 1 details -->
            <!--- Collecting that Data -->
            <?php
                $team1_sql = "SELECT * FROM teamDetails, managerDetails WHERE teamDetails.tid = managerDetails.id AND tid = '$team1_id'";
                $result = mysqli_query($conn, $team1_sql) or die(mysqli_error($conn));
                $team1_row = $result->fetch_assoc();
                $result->close();
            ?>
            <div class="col-lg-3">
                <!-- teamlogo -->
                <div class = "col-lg-12" style = "width=100%; height = 100%; padding = 20px;">
                    <img src="<?php echo $team1_row['logo'] ?>" class="img-fluid" alt="Responsive image">
                </div>
                <hr>

                <!-- Team points and manager-->
                <div class="col-lg-12">
                    <h3 class="text-center"><?php echo $team1_row['teamName'] ?></h3>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6" style="float: left;"><h5>Points:</h5></div>
                    <div class="col-lg-6" style="float: right;"><h5><?php echo $team1_row['points'] ?></h5></div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6" style="float: left;"><h5>Manager:</h5></div>
                    <div class="col-lg-6" style="float: right;"><h5><?php echo $team1_row['name'] ?></h5></div>
                </div>
                <br>
                <br>
        </div>

            <!---- DISPLAYING Match Details  -->
            <div class="col-lg-6">
                <h5 class="text-center" id="textChange">Fixture Details</h5>
                <hr>

                <div class="col-lg-12">
                    <div class="col-lg-6" style="float: left;"><h5>Sport:</h5></div>
                    <div class="col-lg-6" style="float: right;">
                        <h5>
                            <?php
                                $sport_sql = "SELECT s.sName, s.sID FROM sportDetails as s, events WHERE (s.sID = events.sport AND events.eventID = $page_id)";
                                $result = mysqli_query($conn, $sport_sql) or die(mysqli_error($conn));
                                $sport_row = $result->fetch_assoc();
                                echo $sport_row['sName'];
                                $result->close();
                            ?>

                        </h5>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6" style="float: left;"><h5>Date:</h5></div>
                    <div class="col-lg-6" style="float: right;"><h5><?php echo $row['Date'] ?></h5></div>
                </div>
                <br>
                <br>

                <!--- Dsiplaying Players -->
                <h5 class="text-center" id="textChange">Match Players</h5>
                <hr>

                <!-- Made a loader and displayed it through AJAX  -->
                <div class="text-center">
                    <img src="assets/images/loader.gif" id="loader" alt="" width="200" style="display:none;">
                </div>
                <div class="row" id="result">
                    <?php
                        $sql = "SELECT p.pid, p.pname, p.Department, p.picture, t.teamName FROM playerDetails as p, teamDetails as t WHERE t.tid = p.teamID AND (t.tid = '$team1_id' OR t.tid = '$team2_id')";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($player_row = $result->fetch_assoc()){
                    ?>
                    <div class="col-md-4 mb-3"> <!--- Edit here to fix the number of players visible in the section -->
                        <div class="card-deck">
                            <a href="player.php?id=<?php echo $player_row['pid'] ?>">
                            <div class="card border-secondary">
                                <img src="<?= $player_row['picture']; ?>" class="card-img-top">
                                <div class="card-img-overlay">
                                    <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1"><?= $player_row['pname']; ?></h6>
                                </div>
                                <!-- Body of the content  -->
                                <div class="card-body">
                                    <h4 class="card-title text-danger text-center"><?= $player_row['teamName']; ?></h4>
                                    <p class="text-center">
                                        <?= $player_row['Department']; ?> <br>
                                    </p>
                                </div> <!--- End card body--->
                            </div>
                        </a>
                        </div>
                    </div>
                <?php } $result->close();?>
                </div>
            </div>

            <!-- Displaying Logo and filters all of our filters for TEAM 2 -->
            <?php

                $team2_sql = "SELECT * FROM teamDetails, managerDetails WHERE teamDetails.tid = managerDetails.id AND tid = '$team2_id'";
                $result = mysqli_query($conn, $team2_sql) or die(mysqli_error($conn));
                $team2_row = $result->fetch_assoc();
                $result->close();
            ?>
            <div class="col-lg-3">
                <!-- teamlogo -->
                <div class = "col-lg-12" style = "width=100%; height = 100%; padding = 20px;">
                    <img src="<?php echo $team2_row['logo'] ?>" class="img-fluid" alt="Responsive image">
                </div>
                <hr>

                <!-- Team points and manager-->
                <div class="col-lg-12">
                    <h3 class="text-center"><?php echo $team2_row['teamName'] ?></h3>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6" style="float: left;"><h5>Points:</h5></div>
                    <div class="col-lg-6" style="float: right;"><h5><?php echo $team2_row['points'] ?></h5></div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6" style="float: left;"><h5>Manager:</h5></div>
                    <div class="col-lg-6" style="float: right;"><h5><?php echo $team2_row['name'] ?></h5></div>
                </div>
                <br>
                <br>
            </div>
        </div>
        <hr>
        <br>
    </div> <!-- Whole Container -->

    <!--- Diplay Similar Events --->

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-lg-12">
                <br>
                <h3 class="text-center"> Find Similar Events</h3>
            </div>
            <br>

            <div class="col-lg-12">
                <div class="row" id="result">
                    <?php

                        $sql = "SELECT events.eventID, events.teamA, events.teamB, events.Date, sportdetails.sName, sportdetails.sport_logo FROM events, sportdetails WHERE events.sport = sportdetails.sID AND (events.eventID != '$page_id') AND (events.sport = '$sport_id' OR events.team1 IN ('$team1_id', '$team2_id') OR events.team2 IN ('$team2_id', '$team1_id'))";

                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($sim_row = $result->fetch_assoc()){
                    ?>
                    <!-- Made a loader and displayed it through AJAX  -->
                    <div class="col-md-3 mb-2">
                        <div class="card-deck">
                            <a href="event.php?id=<?php echo $sim_row['eventID'] ?>">
                            <div class="card border-secondary">
                                <img src="<?= $sim_row['sport_logo']; ?>" class="card-img-top">
                                <div class="card-img-overlay">
                                    <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1"><?= $sim_row['sName']; ?></h6>
                                </div>
                                <!-- Body of the content  -->
                                <div class="card-body">
                                    <h4 class="card-title text-danger text-center"><?= $row['Date']; ?></h4>
                                    <p class="text-center">
                                        <?= $sim_row['teamA']; ?> vs <?= $sim_row['teamB']; ?>  <br>
                                    </p>
                                </div> <!--- End card body--->
                            </div>
                        </a>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>

        </div>

    </div>

    <!--- FOOTER --->
      <br>
      <br>
      <div class="col-lg-12">
        <footer class="main-block dark-bg" style="background: black; padding: 90px;">
          <div class="container">
            <div class="row" style="flex-wrap: wrap; display: flex;">
              <div class="col-lg-12" style="align-self: center;">
                <div class="copyright" style="text-align: center;">
                  <p style="color: #ccc;">Copyright © 2020 SNU Sports. All rights reserved</p>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Adding Style code  -->
    <style media="screen">
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
    </style>

    </script>
  </body>

  <?php
    // Close php connections
    $conn->close();
  ?>
</html>
