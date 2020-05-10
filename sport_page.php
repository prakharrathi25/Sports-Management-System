<?php
    include 'dbh.php';

    // Declare global teams array
    $teams = array(
        1=> "Panthers",
        2=> "Bulls",
        3=> "Phoenix",
        4=> "Falcons",
    );

    // Get Sport Details
    $page_id = $_GET['id'];
    $sql = "SELECT * FROM sportDetails WHERE sID= '$page_id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = $result->fetch_assoc();
    $result->close();
?>

<!DOCTYPE html>
<html>

    <link rel="stylesheet" href="playerscss.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
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
        <!--- NAVBAR END --->
       </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="cl-md-3">
                <center>
                    <img style=" border-radius: 5px; border: 1px solid black;" src="<?php echo $row['sport_logo'] ?>" width="400px" height="400px">
                </center>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <br>
                <br>
                <br>
                <div>
                    <h2>Sport Name:</h2>
                    <p style=" word-wrap: break-word;"><?php echo $row['sName'] ?></p>
                </div>

                <div>
                    <h2>Current Leader:</h2>
                    <p style=" word-wrap: break-word;"><?php echo $teams[$row['currentLeader']] ?></p>
                </div>

                <div>
                    <h2>Top rated Player:</h2>
                    <p style=" word-wrap: break-word;">
                        <?php
                            $rating_sql = "SELECT pname, MAX(rating) FROM playerDetails WHERE playerdetails.primarySportID = '$page_id'";
                            $result = mysqli_query($conn, $rating_sql) or die(mysqli_error($conn));
                            $rating_row = $result->fetch_assoc();
                            echo $rating_row['pname'];
                            $result->close();
                        ?>
                    </p>
                </div>

            </div>
            <!-- <div class="col-md-4">
                <br>
                <br>
            </div> -->
        </div>
    </div>
    <br>
    <br>
    <hr>
    <div class="container-fluid">
    <div class="col-lg-2 col-sm-12">

    </div>
    <div class="col-lg-8 col-xs-12 col-sm-12">
        <div class="Quote" style="margin-left: 125px; clear: both;">
            <br>
            <h1>Upcoming Matches:</h1>
            <br>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row" style="font-size: 25px">Match-up</th>
                        <th scope="row" style="font-size: 25px">Date</th>
                        <th scope="row" style="font-size: 25px">Venue</th>
                    </tr>
                        <!--- Print rows in a while loop -->
                        <?php
                            $sql = "SELECT events.teamA, events.teamB, events.Date, sportDetails.venue from events,sportDetails WHERE events.sport = sportDetails.sID AND sport = '$page_id'";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            while($row = $result->fetch_assoc()){
                        ?>
                    <tr>
                        <td style="font-size: 20px;"><?= $row['teamA'] ?> vs <?= $row['teamB'] ?></td>
                        <td style="font-size: 25px;"><?= $row['Date'] ?></td>
                        <td style="font-size: 20px;"><?= $row['venue'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <br>
    <br>

    <!-- Footer -->
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
    </body>
</html>
