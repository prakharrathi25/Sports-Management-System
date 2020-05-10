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

    // Get TEAM Details
    $page_id = $_GET['id'];
    $sql = "SELECT * FROM teamDetails, managerDetails WHERE teamDetails.tid = managerDetails.id AND tid = '$page_id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = $result->fetch_assoc();
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
<div class="container-fluid">
        <!-- NAVBAR OF THE PAGE -->
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
    <!--- Dislay of team details and filters starts -->
    <div class="container-fluid">
        <div class="row">
            <!-- Displaying team details starts  -->
            <div class="col-lg-3">
                <!-- teamlogo -->
                <div class = "col-lg-12" style = "width=100%; height = 100%; padding = 20px;">
                    <img src="<?php echo $row['logo'] ?>" class="img-fluid" alt="Responsive image">
                </div>
                <hr>
                <!-- Team points and manager-->
                <div class="col-lg-12">
                    <h3 class="text-center"><?php echo $row['teamName'] ?></h3>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6" style="float: left;"><h5>Points:</h5></div>
                    <div class="col-lg-6" style="float: right;"><h5><?php echo $row['points'] ?></h5></div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6" style="float: left;"><h5>Manager:</h5></div>
                    <div class="col-lg-6" style="float: right;"><h5><?php echo $row['name'] ?></h5></div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6" style="float: left;"><h5>Total Players:</h5></div>
                    <div class="col-lg-6" style="float: right;"><h5><?php echo $row['numPlayers'] ?></h5></div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <!--- DISPLAYING FILTERS --->

                <!-- DISPLAYING Gender options -->
                <h5 class="text-center">Player Filters</h5>
                <h6 class="text-info">Select Gender</h6>
                <ul class="list-group">

                    <?php
                        $gender_sql = "SELECT DISTINCT Gender FROM playerDetails ORDER BY Gender";
                        $result=mysqli_query($conn, $gender_sql) or die(mysqli_error($conn));

                        // Display results in a while loop
                        while($row=$result->fetch_assoc()){
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label for="" class="form-check-label">
                                <input type="checkbox" class="form-check-input product_check" name="" value="<?= $row['Gender']; ?>" id="gender"> <?= $row['Gender']; ?>
                            </label>
                        </div>
                    </li>
                <?php } ?>
                </ul>
                <br>

                <!-- DISPLAYING Sport OPTIONS -->
                <h6 class="text-info">Select Sport</h6>
                <ul class="list-group">
                    <!-- Getting unique sport value for -->
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
                                <input type="checkbox" class="form-check-input product_check" name="" value="<?= $row['dept']; ?>" id="dept"> <?= $row['dept']; ?>
                            </label>
                        </div>
                    </li>
                <?php } ?>
                </ul>
                <br>
        </div>


            <!--- DISPLAYING PLAYERS  -->
            <div class="col-lg-9">
                <h5 class="text-center" id="textChange">All Players</h5>
                <hr>

                <!--- SEARCH BAR --- >
                <!-- Search form -->
                <div class="md-form active-purple active-purple-2 mb-3">
                  <input class="form-control" type="text" placeholder="Search for your favourite players" id="search" aria-label="Search" name="search" style="bacbackground-color: black; ">
                </div>


                <!-- Made a loader and displayed it through AJAX  -->
                <div class="text-center">
                    <img src="assets/images/loader.gif" id="loader" alt="" width="200" style="display:none;">
                </div>
                <!-- Player Display Begins -->
                <div class="row" id="result">
                    <?php
                        $sql = "SELECT p.pid, p.pname, p.Department, p.picture, t.teamName FROM playerDetails as p, teamDetails as t WHERE t.tid = p.teamID AND tid = '$page_id'";
                        $result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = $result->fetch_assoc()){
                    ?>
                    <div class="col-md-3 mb-2">
                        <div class="card-deck">
                            <a href="player.php?id=<?php echo $row['pid'] ?>">
                            <div class="card border-secondary">
                                <img src="<?= $row['picture']; ?>" class="card-img-top">
                                <div class="card-img-overlay">
                                    <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1"><?= $row['pname']; ?></h6>
                                </div>
                                <!-- Body of the content  -->
                                <div class="card-body">
                                    <h4 class="card-title text-danger text-center"><?= $row['teamName']; ?></h4>
                                    <p class="text-center">
                                        <?= $row['Department']; ?> <br>
                                    </p>
                                    <!-- <a href='player.php?id=".$row['pid']."' class="btn btn-success btn-block active"> Player Details </a> -->
                                    <!-- <a href="index1.html" class="btn btn-primary">Go somewhere</a> -->
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

    <!-- BEGIN jQuery and AJAX -->

    <!-- Search Players AJAX and jQuery Code --->
    <script type="text/javascript">
        $(document).ready(function(){

            // Event triggered when something is written
            $("#search").keyup(function(){
                var search = $(this).val();
                console.log(search);
                // First show a loader
                $("#loader").show();

                // Getting team variable
                var team = "<?php
                $page_id = $_GET['id'];
                $sql = "SELECT teamName FROM teamDetails WHERE tid = '$page_id'";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $row = $result->fetch_assoc();
                echo $row['teamName']?>";
                console.log(team); 

                $.ajax({
                    url: 'assets/actions/search_action.php',
                    method: 'post',
                    data: {query: search, team: team},
                    success: function(response){
                        $("#result").html(response);
                        $('#loader').hide() // Hide the loader
                        $('#textChange').text("Filtered Players")
                    }
                });
            });
        });
    </script>

    <!-- Writing the jQuery and AJAX Code for filtering  -->
    <script type="text/javascript">
        $(document).ready(function(){

            // Targetting the check box activity
            $(".product_check").click(function(){
                // First show a loader
                $("#loader").show();

                var action = 'data';
                // Fill the IDs that have been assigned in the input field
                var team = "<?php
                $page_id = $_GET['id'];
                $sql = "SELECT teamName FROM teamDetails WHERE tid = '$page_id'";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $row = $result->fetch_assoc();
                echo $row['teamName']?>";

                // Other attributes
                var gender = get_filter_text('gender');
                var sport = get_filter_text('sport');
                var dept = get_filter_text('dept');

                // php page to handle the queries
                $.ajax({
                    url: 'assets/actions/team_action.php',
                    method: 'POST',
                    data: {action: action, team: team, gender: gender, sport: sport, dept: dept},
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
            }
        });
    </script>
  </body>
</html>
