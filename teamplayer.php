<?php
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role']!='player'){
        header("location:login.php");
    }
?>

<h1> Hello : <?php $_SESSION['username'] ?></h1>
<h2>You are a : <?php $_SESSION['role'] ?></h2>
<a class="button" href="logout.php">Logout</a> 
