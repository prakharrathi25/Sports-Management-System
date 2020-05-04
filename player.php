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

        <!-- NAVBAR OF THE PAGE -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="https://snu.edu.in/"><img src="assets\images\snu_logo.jpg" class="img-fluid"
                    alt="Responsive image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" id="header1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="https://snu.edu.in/events?cat=7">
                            <h1> Events </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://snu.edu.in/events?cat=7">
                            <h1> News </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://snu.edu.in/campus-life/sports?qt-sports_section=2#qt-sports_section">
                            <h1> Results </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://snu.edu.in/campus-life/sports?qt-sports_section=3#qt-sports_section">
                            <h1> SNUSL </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://snu.edu.in/campus-life/sports?qt-sports_section=4#qt-sports_section">
                            <h1> Staff </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://snu.edu.in/campus-life/sports?qt-sports_section=5#qt-sports_section">
                            <h1> Facility </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://snu.edu.in/campus-life/sports?qt-sports_section=6#qt-sports_section">
                            <h1> Calender </h1><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <!--<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </li>
                        </ul>-->
                    <div class="dropdown" id="login1">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login: <span class="glyphicon glyphicon-user"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="playerlogin.html">Player Login</a>
                            <a class="dropdown-item" href="managerlogin.html">manager login</a>
                            <a class="dropdown-item" href="guestlogin.html">guestlogin</a>
                        </div>
                        <!--<form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>-->
                    </div>
        </nav>
        <!--- NAVBAR END --->

        <!-- PLAYER PAGE START -->

        <!-- Database Connection  -->
        <?php
        include 'dbh.php';
        ?>

        <?php
            $curr_id = $_GET['id'];
            $sql = "SELECT * FROM playerDetails WHERE pid = '$curr_id'";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $row = $result->fetch_assoc();
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="cl-md-3">
                    <center>
                        <img style=" border-radius: 5px; border: 1px solid black;" src="<?php echo $row['picture'] ?>" width="500px" height="500px">
                    </center>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <br>
                    <br>
                    <div>
                        <h2>Name:</h2>
                    </div>
                    <p style=" word-wrap: break-word;"><?php echo $row['pname'] ?></p>
                    <div>
                        <h2>Played Matches:</h2>
                    </div>
                    <p style=" word-wrap: break-word;"><?php echo $row['playedMatches']; ?></p>
                    <div>
                        <h2>Wins:</h2>
                    </div>
                    <p style=" word-wrap: break-word;"><?php echo $row['wins']; ?></p>
                    <div>
                        <h2>Rating:</h2>
                    </div>
                    <p style=" word-wrap: break-word;"><?php echo $row['rating']; ?></p>
                </div>
                <div class="col-md-3">
                    <br>
                    <br>
                    <h3>Sport:</h3>
                    <p>
                        <?php
                            $sql = "SELECT s.sName as sport, p.pid from sportDetails as s, playerDetails as p WHERE s.sID = p.primarySportID";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            $r1 = $result->fetch_assoc();
                            echo $r1['sport'];

                        ?>
                    </p>
                    <h3>Team:</h3>
                    <p>
                        <?php
                            $tsql = "SELECT t.teamName as team , p.pid from teamDetails as t, playerDetails as p WHERE t.tid = p.teamID";
                            $result = mysqli_query($conn, $tsql) or die(mysqli_error($conn));
                            $r2 = $result->fetch_assoc();
                            echo $r2['team'];
                        ?>
                    </p>
                    <h3>Department:</h3>
                    <p><?php echo $row['Department']; ?></p>
                    <h3>Level of Study:</h3>
                    <p><?php echo $row['LevelofStudy']; ?></p>
                </div>
                <div class="col-md-4">
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="col-lg-6">
            <div class="Quote" style="margin-left: 125px; clear: both;">
                <br>
                <h3>Favorite Quote</h3>
                <blockquote class="blockquote">
                    <p class="mb-0"><?php echo $row['quote']; ?></p>
                </blockquote>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="Quote" style="margin-left: 125px; clear: both;">
                <br>
                <h3>Highlights</h3>
                <blockquote class="blockquote">
                    <p class="mb-0"><?php echo $row['highlight']; ?></p>
                </blockquote>
        </div>
        </body>



</html>
