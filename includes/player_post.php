<!-- PHP file for posting the player data to the database -->

error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

<?php
    include_once 'dbh.php'
?>
<h1> Registration Confirmation </h1>

<?php

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


    $sql = "INSERT INTO playerDetails VALUES(NULL, $name, $gender, $match_num, $win_num, NULL, $p_sport, $s_sport, $rating, $team, $team, $bid, $dept, $join_year,  $level, $pass_year, $quote)";

    mysqli_query($conn, $sql)

    header("Location: ../playerReg.html?entry=success")

?>
