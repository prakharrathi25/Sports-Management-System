<?php
    // Start session inside the same php file
    session_start();
    include 'dbh.php';
    $msg = "";

    // If the button is clicked
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $type = $_POST['userType'];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND user_type= '$type'";

        // Send query and get results back
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $row = $result->fetch_assoc();

        // Generate a new session ID
        session_regenerate_id();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['user_type'];
        session_write_close(); // Close the session here

        // Obtain new page ID
        $page_id = $row['id'];

        // Generate different sessions for different users
        if($result->num_rows==1 && $_SESSION['role']=='player'){
            $location = "location:teamplayer.php?id=".$page_id;
            header($location); // Take player to update area
        }else if($result->num_rows==1 && $_SESSION['role']=='manager'){
            $location = "location:manager.php?id=".$page_id;
            header($location); // Take manager to insert area

        }else{
            $msg = "Username or Password is Incorrect!"; // if username and password don't match and 0 results are returned
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>

        <!-- Required meta tags -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Login to the website</title>
    </head>
    <body>
    <div class="col-lg-12">
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
                    <!--<div class="dropdown" style="float:right; margin-right: 125px; margin-top: 20px; margin-left: 600px;">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login<span class="glyphicon glyphicon-user">Prakhar</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="playerlogin.html">Logout</a>
                        </div>-->
                    </div>
                </ul>
        </nav>
    </div>
        
        <!-- Page Background and designing along with the form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 mt-5 px-0"> <!-- This container can be given a color -->
                <h3 class="text-center p-3"> User Login </h3>
                <!--- Creating a form -->
                <form class="p-4" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="username" value="" placeholder="Username/Email" required>
                    </div>
                    <div class="form-group lead">
                        <input type="password" class="form-control form-control-lg" name="password" value="" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="userType">I am a :</label><br>
                        <input type="radio" name="userType" value="player" class="custom-radio" required>&nbsp; Player
                        <input type="radio" name="userType" value="manager" class="custom-radio" required>&nbsp; Manager
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
                    </div>
                    <h5 class="text-center"><?= "$msg"; ?></h5>
                </form>
            </div>
        </div>
    </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
