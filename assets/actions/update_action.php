<!-- PHP file for posting the player data to the database -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
          integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
          integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Player Registration</title>
    </head>
</html>
<?php
    // Making a server connection
    $server = "localhost";
    $username = "root";
    $password = "mysql@123";
    $dbname = "sports-database";
    $conn = mysqli_connect($server, $username, $password, $dbname);

    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }

    // Field val array
    $fields = array("bogus", "pname", "Department", "Gender", "lastBid", "YearofPassing", "quote", "highlight", "playedMatches", "wins");

?>
<!-- <div class="col-lg-12">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="https://snu.edu.in/" style="width: max-content;"><img src="assets\images\snu_logo.jpg" class="img-fluid" style="width: max-content;"
        alt="Responsive image"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" id="header1">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="allevents.php">
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
      </ul>
  </nav>
</div> -->


<?php

    // Get player details
    $page_id = $_GET['id'];

    // Check if the submit button was pressed
    if (isset($_POST['update'])){

        $fieldVal = (int)$_POST['update-field'];
        $old = $_POST['old'];
        $new = $_POST['new'];
        $field = $fields[$fieldVal];

        // Check old value first
        $sql = "SELECT ".$field." from playerDetails WHERE pid = $page_id";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $row = $result->fetch_assoc();

        if($row[$field] == $old)
        {
            echo "<h1> UPDATE SUCCESSFUL </h1>";
            $sql = "UPDATE playerDetails SET ".$field." = '".$new."' WHERE pid = $page_id";
            echo $sql;
            //Perform a query, check for error
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }else{
            echo "<h1> Values don't match </h1>";
        }

    }
?>


<div class="jumbotron text-xs-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Your entry has been updated!</strong></p>
  <hr>
  <p>
    View Players? <a href="./../all_players.php">View Players</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="../../player_update.php?id=<?php echo $page_id ?>" role="button">Go back</a>
  </p>
</div>
