<?php
    include 'dbh.php';
?>
<!DOCTYPE html>
<html>

<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<link rel="stylesheet" href="assets/css/project2.css">
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
<div class="col-lg-12">
    <!-- NAVBAR -->
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
                <div class="dropdown" style="float:right; margin-right: 125px; margin-top: 20px; margin-left: 600px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login:<span class="glyphicon glyphicon-user"></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="login.php">player/Manager Login</a>
                    </div>
                </div>
            </ul>
    </nav>
</div>
<br>
    <div class="col-lg-12">
        <div class="row">
        <div class="col-lg-2">
            <p></p>
        </div>
    <div class="col-lg-8">
        <h1 class="heading">SNU Sports: "United We Play. United We Win"</h1>
        <p id="p"> Sports Program at SNU is designed to serve student interest in different sports and recreational
            activities.
            These
            interests can be competitive, recreational or instructional in nature; students may represent the University
            in
            inter-university competition or intra-club (SNUSL) league activities such as tournament play, training,
            instruction, and
            social interaction (recreational) events.</p>

        <p id="p">Department of Physical Education desires to extend sporting and recreational events to any
            student/faculty/staff/family
            residents on campus & support staff (housekeeping, security, maintenance etc.) at the university providing
            the
            opportunity to participate individually or in mass with a team in the sports program at SNU.</p>
    </div>
    <div class="col-lg-2">
    </div>
    </div>
    </div>
    <br>
    <br>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-4">
                <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="10000">
                            <img src="assets/images/img1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-interval="2000">
                            <img src="assets/images/ISC_banner.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/football.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
    <div class="col-lg-4">
        <table class="table table-dark" style="width: 600px;height: 300px; font-size: 30px;">
            <thead>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * from teamDetails";
                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <th scope="row"><?= $row['tid'] ?></th>
                    <td colspan="2"><?= $row['teamName'] ?></td>
                    <td><?= $row['points'] ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
    <div class="col-lg-2">
    </div>
    </div>
    </div>
    <br>
    <br>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-10">
                <h1 class="teams">MEET the teams of SNU: </h1>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="container-fuild flexing" style="width: auto;">
            <a href="team_page.php?id=2"><img src="assets/images/bulls_logo.jpeg" class="img"></a>
            <a href="team_page.php?id=1"><img src="assets/images/panthers_logo.jpeg" class="img"></a>
            <a href="team_page.php?id=4"><img src="assets/images/falcons_logo.jpg" class="img"></a>
            <a href="team_page.php?id=3"><img src="assets/images/phoenix_logo.jpeg" class="img"></a>
        </div>
    </div>
    <div class="col-lg-2">
    </div>
    </div>


    <br>
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
</body>

</html>
