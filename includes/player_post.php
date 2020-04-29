<!-- PHP file for posting the player data to the database -->

<?php
    // include 'dbh.php';
    $server = "localhost";
    $username = "root";
    $password = "mysql@123";
    $dbname = "sports-database";
    $conn = mysqli_connect($server,$username,$password, $dbname);

?>
<h1> Registration Confirmation </h1>

<?php

    // Declare input variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $match_num = (int)$_POST['$match_num'];
    $win_num = (int)$_POST['win_num'];
    $p_sport = (int)$_POST['p_sport'];
    $s_sport = (int)$_POST['s_sport'];
    $team = (int)$_POST['team'];
    $manager = (int)$_POST['team'];
    $bid = (int)$_POST['bid'];
    $dept = $_POST['dept'];
    $join_year = (int)$_POST['join_year'];
    $level = $_POST['level'];
    $pass_year = (int)$_POST['pass_year'];
    $quote = $_POST['quote'];

    // if($match_num > 0 && $win_num > 0){
    //   $rating = (($win_num * 100)/$match_num);
    // }

    // Testing the inputs
    echo "$name" . "<br>";
    echo "$gender" . "<br>";
    echo gettype($match_num). "<br>";
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

    $sql = "INSERT INTO playerDetails VALUES($name, $gender, $match_num, $win_num, NULL, $p_sport, $s_sport, NULL, $team, $manager, $bid, $dept, $join_year,  $level, $pass_year, $quote)";
    echo "$sql";
    mysqli_query($conn, $sql);
    // header("Location: ../playerReg.html?entry=success")

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
