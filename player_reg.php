<?php

    include 'header.php';
?>
<h1> Registration Confirmation </h1>

<?php

if(isset($_POST['register-button'])){

    // Declare input variables
    $name = mysqli_real_escape_string($conn, $_POST['name'];
    $gender = mysqli_real_escape_string($conn, $_POST['gender'];
    $$match_num = mysqli_real_escape_string($conn, $_POST['$match_num'];
    $win_num = mysqli_real_escape_string($conn, $_POST['win_num'];
    $p_sport = mysqli_real_escape_string($conn, $_POST['p_sport'];
    $s_sport = mysqli_real_escape_string($conn, $_POST['s_sport'];
    $team = mysqli_real_escape_string($conn, $_POST['team'];
    $dept = mysqli_real_escape_string($conn, $_POST['dept'];
    $join_year = mysqli_real_escape_string($conn, $_POST['join_year'];
    $level = mysqli_real_escape_string($conn, $_POST['level'];
    $pass_year = mysqli_real_escape_string($conn, $_POST['pass_year'];
    $quote = mysqli_real_escape_string($conn, $_POST['quote'];
    $rating = ($match_num/$win_num) * 100;

    // SQL Query
    $sql = "INSERT INTO playerDetails VALUES($name, $gender, $match_num, $win_num, NULL, $p_sport, $s_sport, $rating, $team, $team, $bid, $dept, $join_year,  $level, $pass_year, $quote)";

    mysqli_query($conn, $sql);
}

// Display HTML confirmation
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
