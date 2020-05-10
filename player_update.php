<?php
    include 'dbh.php';

    // Get Player Details
    $page_id = $_GET['id'];
    $sql = "SELECT * FROM playerDetails, sportDetails WHERE sportDetails.sID = playerDetails.primarySportID AND pid = '$page_id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = $result->fetch_assoc();

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <title>Player Update Page</title>
</head>

<body>
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="https://snu.edu.in/" style="width: max-content;"><img
                    src="assets/images/snu_logo.jpg" class="img-fluid" style="width: max-content;"
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
                            Logged in as: <span><?php
                                $sql = "SELECT * FROM users WHERE id = '$page_id'";
                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                $user_row = $result->fetch_assoc();
                                echo $user_row['name'];
                            ?></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                </ul>
        </nav>
    </div>
                <!--- NAVBAR END --->
    <br>
    <br>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <h3>Name : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['pname']; ?></p>
                <div class="row">
                    <h3>Gender : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['Gender']; ?></p>
                <div class="row">
                    <h3>Primary sport : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['sName']; ?></p>

                <div class="row">
                    <h3>Team : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $teams[$row['teamID']]; ?></p>
                <div class="row">
                    <h3>Are you a captain : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php print ($row['isCaptain'] == 0) ? "No" : "Yes"; ?></p>
                <div class="row">
                    <h3>Matches played : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['playedMatches']; ?></p>
                <div class="row">
                    <h3>Matches won : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['wins']; ?></p>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <h3>Select department : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['Department']; ?></p>
                <div class="row">
                    <h3>Last Bid price : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['lastBid']; ?></p>
                <div class="row">
                    <h3>Year of joining : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['YearofJoining']; ?></p>
                <div class="row">
                    <h3>Year of passing : </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['YearofPassing']; ?></p>
                <div class="row">
                    <h3>Your Favourite Quote </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['quote']; ?></p>
                <div class="row">
                    <h3>Highlights </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['highlight']; ?></p>
                <div class="row">
                    <h3>Rating </h3>
                </div>
                <p style=" word-wrap: break-word;"><?php echo $row['rating']; ?></p>
                <div class="row">
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>
    <form action="assets/actions/update_action.php?id=<?php echo $page_id ?>" method="POST">
        <div class="container">
            <div class="row">
                <div class="form-group col-lg-4">
                  <label for="exampleFormControlSelect1">Field to change</label>
                  <select class="form-control" id="update" name="update-field" required>
                    <option value=1>Name</option>
                    <option value=2>Department</option>
                    <option value=3>Gender</option>
                    <option value=4>Bid Price</option>
                    <option value=5>Passing Year</option>
                    <option value=6>Quote</option>
                    <option value=7>Highlights</option>
                    <option value=8>Matches Played</option>
                    <option value=9>Matches Won</option>
                  </select>
                </div>

                <div class="form-group col-lg-3">
                  <label for="exampleFormControlSelect1">Old Value</label><br>
                  <input type="text" name="old" value="" placeholder="Old Value" required>
                </div>

                <div class="form-group col-lg-3">
                  <label for="exampleFormControlSelect1">New Value</label><br>
                  <input type="text" name="new" value="" placeholder="New Value" required>
                </div>

                <!-- Submit Button -->
                <div class="form-group col-lg-2">
                    <br>
                    <button type="submit" name="update" class="btn btn-primary mb-2">Update</button>
                </div>

            </div>
        </div>
    </form>


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
</body>

</html>
