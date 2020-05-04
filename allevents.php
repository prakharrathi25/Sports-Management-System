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

    // Declare global teams array
    $teams = array(
        1=> "Panthers",
        2=> "Bulls",
        3=> "Phoenix",
        4=> "Falcons",
    );

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
    <!-- <h3 class="text-center text-light bg-info"> Displaying all Events</h3> -->
    <!-- NAVBAR AND HEADER -->

    <!--- Main container begins -->
    <div class="container-fluid">
        <div class="row">

            <!-- Displaying all of our filters -->
            <div class="col-lg-3">
            <h5>Event Filters</h5>
            <hr>

            <!-- DISPLAYING TEAM OPTIONS -->
            <h6 class="text-info">Select Team</h6>
            <ul class="list-group">
                <!-- Getting unique team value for our teams -->
                <?php
                    $team_sql = "SELECT teamName, tid FROM teamDetails ORDER BY teamName LIMIT 4";
                    $result = mysqli_query($conn, $team_sql) or die(mysqli_error($conn));

                    // Display results in a while loop
                    while($row=$result->fetch_assoc()){
                ?>
                <li class="list-group-item">
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="checkbox" class="form-check-input product_check" name="" value="<?= $row['tid']; ?>" id="team"> <?= $row['teamName']; ?>
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
                            <input type="checkbox" class="form-check-input product_check" name="" value="<?= $row['sName']; ?>" id="sport"> <?= $row['sName']; ?>
                        </label>
                    </div>
                </li>
            <?php } ?>
            </ul>
            <br>
        </div>

            <!--- Event Section Begins -->
            <div class="col-lg-9">
                <h5 class="text-center" id="textChange">All Upcoming Events</h5>
                <hr>

                <!---- SEARCH BAR --- >
                <!-- Search form -->
                <div class="md-form active-purple active-purple-2 mb-3">
                  <input class="form-control" type="text" placeholder="Search for your favourite players" id="search" aria-label="Search" name="search" style="bacbackground-color: black; ">
                </div>

                <!---- DISPLAYING EVENTS  -->
                <div class="text-center">
                    <img src="assets/images/loader.gif" id="loader" alt="" width="200" style="display:none;">
                </div>

                <div class="row" id="result">
                    <?php
                        $sql = "SELECT events.eventID, events.team1, events.team2, events.Date, sportdetails.sName, sportdetails.sport_logo FROM events, sportdetails WHERE sportdetails.sID = events.sport";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = $result->fetch_assoc()){
                    ?>
                    <!-- Made a loader and displayed it through AJAX  -->
                    <div class="col-md-3 mb-2">
                        <div class="card-deck">
                            <a href="event.php?id=<?php echo $row['eventID'] ?>">
                            <div class="card border-secondary">
                                <img src="<?= $row['sport_logo']; ?>" class="card-img-top">
                                <div class="card-img-overlay">
                                    <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1"><?= $row['sName']; ?></h6>
                                </div>
                                <!-- Body of the content  -->
                                <div class="card-body">
                                    <h4 class="card-title text-danger text-center"><?= $row['Date']; ?></h4>
                                    <p class="text-center">
                                        <?= $teams[$row['team1']]; ?> vs <?= $teams[$row['team2']]; ?>  <br>
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

    <!-- Writing the AJAX and jQuery Code -->

    <!-- Search Players AJAX and jQuery Code --->
    <!-- <script type="text/javascript">
        $(document).ready(function(){

            // Event triggered when something is written
            $("#search").keyup(function(){
                var search = $(this).val();

                $.ajax({
                    url: 'search_player.php',
                    method: 'post',
                    data: {query: search},
                    success: function(response){
                        $("result").html(respose);
                    }
                });
            });
        });
    </script> -->
    <!--- Filter Players AJAX and jQuery Code --->
    <script type="text/javascript">
        $(document).ready(function(){

            // Targetting the check box activity
            $(".product_check").click(function(){
                // First show a loader
                $("#loader").show();

                var action = 'data';
                // Fill the IDs that have been assigned in the input field
                var team = get_filter_text('team');
                var sport = get_filter_text('sport');

                // php page to handle the queries
                $.ajax({
                    url: 'assets/actions/event_action.php',
                    method: 'POST',
                    data: {action: action, team: team, sport: sport},
                    success: function(response){
                        // Changes that will take place once the query returns successfully.
                        $("#result").html(response);
                        $('#loader').hide() // Hide the loader
                        $('#textChange').text("Filtered Events")
                    }
                });
            });

            function get_filter_text(text_id){
                var filterData = [];
                $('#' + text_id + ':checked').each(function(){
                    filterData.push($(this).val());
                });
                return filterData;
            }
        });
    </script>
  </body>
</html>
