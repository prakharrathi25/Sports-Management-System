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

    // Get Match Details
    $page_id = $_GET['id'];
    $page_id = '2';
    $sql = "SELECT * FROM events WHERE eventID= '$page_id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = $result->fetch_assoc();
    // Collecting Team IDs before hand
    $team1_id = $row['team1'];
    $team2_id = $row['team2'];
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

    <title>Team Display</title>
  </head>
  <body>
    <!-- <h3 class="text-center text-light bg-info"> Displaying all players</h3> -->
    <!-- NAVBAR AND HEADER -->

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
                                $sport_sql = "SELECT s.sName, s.sID FROM sportDetails as s, events WHERE s.sID = events.sport";
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
                    <div class="col-md-3 mb-2">
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
                                    <!-- <a href='player.php?id=".$row['pid']."' class="btn btn-success btn-block active"> Player Details </a> -->
                                    <!-- <a href="index1.html" class="btn btn-primary">Go somewhere</a> -->
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

        <!--- Adding a card carousel --->
        <div class="bg-dark container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="carousel slide" id = "inam" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="card" style="width: 300px;">
                                                <img src="assets/images/bulls_logo.jpg" alt="">
                                                <!--- Complete card data -->
                                                <!--- LINK https://www.youtube.com/watch?v=WBcCvNASbuc ---> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#inam" class="carousel-control-prev" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a href="#inam" class="carousel-control-next" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Whole Container -->


    <!--- FOOTER --->


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

    <!-- Writing the AJAX Code -->
    <script type="text/javascript">
        $(document).ready(function(){

            // Targetting the check box activity
            $(".product_check").click(function(){
                // First show a loader
                $("#loader").show();

                var action = 'data';
                // Fill the IDs that have been assigned in the input field
                var team = get_filter_text('team');
                var gender = get_filter_text('gender');
                var sport = get_filter_text('sport');
                var dept = get_filter_text('dept');
                var level = get_filter_text('level');

                // php page to handle the queries
                $.ajax({
                    url: 'action.php',
                    method: 'POST',
                    data: {action: action, team: team, gender: gender, sport: sport, dept: dept, level: level},
                    success: function(response){
                        // Changes that will take place once the query returns successfully.
                        $("#result").html(response);
                        $('#loader').hide() // Hide the loader
                        $('#textChange').text("Filtered Products")
                    }
                });
            });

            function get_filter_text(text_id){
                var filterData = [];
                $('#' + text_id + ':checked').each(function(){
                    filterData.push($(this).val());
                });
                console.log(filterData);
                return filterData;
            }
        });
    </script>
  </body>
</html>
