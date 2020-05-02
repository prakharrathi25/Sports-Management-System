<?php
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role']!='manager'){
        header("location:login.php");
    }
?>

<h1> Hello : <?php $_SESSION['username'] ?></h1>
<h2>You are a : <?php $_SESSION['role'] ?></h2>
<h2>You are a : <?php $_SESSION['team'] ?></h2>
<a class="button" href="logout.php">Logout</a>
