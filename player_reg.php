<!-- PHP file for posting the player data to the database -->

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
?>
<h1> Registration Confirmation </h1>

<?php

    // Declare input variables
    $name = (string)$_POST['name'];
    $gender = (string)$_POST['gender'];
    $match_num = (int)$_POST['match_num'];
    $win_num = (int)$_POST['win_num'];
    $p_sport = (int)$_POST['p_sport'];
    $s_sport = (int)$_POST['s_sport'];
    $team = (int)$_POST['team'];
    $manager = (int)$_POST['team'];
    $bid = (int)$_POST['bid'];
    $dept = (string)$_POST['dept'];
    $join_year = (int)$_POST['join_year'];
    $level = $_POST['level'];
    $pass_year = (int)$_POST['pass_year'];
    $quote = $_POST['quote'];

    if($match_num > 0 && $win_num > 0){
      $rating = (($win_num * 100)/$match_num);
    }

    // Testing the inputs
    echo "$name" . "<br>";
    echo "$gender" . "<br>";
    echo "$match_num". "<br>";
    echo "$win_num" . "<br>";
    echo "$p_sport" . "<br>";
    echo "$s_sport" . "<br>";
    echo "$team" . "<br>";
    echo "$dept" . "<br>";
    echo "$join_year" . "<br>";
    echo "$level" . "<br>";
    echo "$pass_year" . "<br>";
    echo "$quote" . "<br>";
    echo "$rating" . "<br>";

    $sql = "INSERT INTO playerDetails(pname, Gender, playedMatches, wins, picture, primarysportID, secondarySportID, rating, teamID, managerID, lastBid, Department, YearofJoining, LevelofStudy, YearofPassing, quote) VALUES('$name', '$gender', $match_num, $win_num, NULL, $p_sport, $s_sport, $rating, $team, $manager, $bid, '$dept', $join_year,  '$level', $pass_year, '$quote')";
    echo "$sql";

    // Perform a query, check for error
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>

<div class="jumbotron text-xs-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Your entry has been stored!</strong></p>
  <hr>
  <p>
    Having trouble? <a href="contact.html">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.html" role="button">Continue to homepage</a>
  </p>
</div>
