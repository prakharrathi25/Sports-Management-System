<?php

    include 'dbh.php';

    // Get TEAM Details
    $page_id = $_GET['id'];
    $sql = "SELECT * FROM teamDetails  WHERE tid = '$page_id'";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Player Registration</title>
  </head>
  <body>
    <div class="col-lg-12">
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
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
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
  <div class="container" style="overflow: hidden;">
    <h1 style=" text-align: center; ">Player Registration Form</h1>

<!-- OLDER FORM -->
<form action="player_reg.php" method="POST" enctype="multipart/form-data">

    <!-- Text Input -->
    <div class="form-group">
      <label for="exampleFormControlInput1">Player Name</label>
      <input type="text" class="form-control" id="name" placeholder="Player Full Name" name="name">
    </div>

    <!-- Gender Input -->
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select Gender</label>
      <select class="form-control" id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </div>

    <!-- Played Matches -->
    <div class="form-group">
      <label for="exampleFormControlInput1">Number of Matches Played</label>
      <input type="number" class="form-control" id="match_num" placeholder="10" name="match_num" required>
    </div>

    <!-- Wins -->
    <div class="form-group">
      <label for="exampleFormControlInput1">Number of Matches Won</label>
      <input type="number" class="form-control" id="win_num" placeholder="10" name="win_num" required>
    </div>

    <!-- Picture Upload -->
    <div class="form-group">
      <label for="exampleFormControlInput1">Upload a picture</label>
      <input type="file" class="form-control" id="plr_img" placeholder="10" name="plr_img" required>
    </div>

    <!-- Primary sport -->
      <div class="form-group">
        <label for="exampleFormControlSelect1">Primary Sport</label>
        <select class="form-control" id="p_sport" name="p_sport" required>
          <option value=1>Football</option>
          <option value=2>Tennis</option>
          <option value=3>Basketball</option>
          <option value=4>Badminton</option>
          <option value=5>Volleball</option>
          <option value=6>Cricket</option>
          <option value=7>Table Tennis</option>
          <option value=8>Squash</option>
          <option value=9>Chess</option>
        </select>
      </div>

      <!-- Secondary sport -->
    <div class="form-group">
      <label for="exampleFormControlSelect1">Secondary Sport</label>
      <select class="form-control" id="s_sport" name="s_sport" required>
        <option value=1>Football</option>
        <option value=2>Tennis</option>
        <option value=3>Basketball</option>
        <option value=4>Badminton</option>
        <option value=5>Volleball</option>
        <option value=6>Cricket</option>
        <option value=7>Table Tennis</option>
        <option value=8>Squash</option>
        <option value=9>Chess</option>
      </select>
    </div>

        <!-- Team Input -->
     <div class="form-group">
       <label for="exampleFormControlSelect1">Select Team</label>
       <select class="form-control" id="team" name="team" required>
         <option value=<?php echo $page_id ?>><?php echo $teams[$page_id]; ?></option>
       </select>
     </div>

     <!-- Captaincy -->
  <div class="form-group">
    <label for="exampleFormControlSelect1">Are you a captain?</label>
    <select class="form-control" id="captain" name="captain" required>
      <option value=1>Yes</option>
      <option value=0>No</option>
    </select>
  </div>

     <!-- Last Bid  -->
      <div class="form-group">
        <label for="exampleFormControlInput1">Last Bid Price</label>
        <input type="number" class="form-control" id="bid" placeholder="10" name="bid" required>
      </div>

      <!-- Department selction -->
      <div class="form-group">
        <label for="exampleFormControlSelect1">Select Department</label>
        <select class="form-control" id="dept" name="dept" required>
          <option value="CSE">CSE</option>
          <option value="ECE/EEE">ECE/EEE</option>
          <option value="Mechanical">Mechanical</option>
          <option value="Civil">Civil</option>
          <option value="Chemical">Chemical</option>
          <option value="History">History</option>
          <option value="Sociology">Sociology</option>
          <option value="Economics">Economics</option>
          <option value="IRGS">IRGS</option>
          <option value="BMS">BMS</option>
          <option value="Mathematics">Mathematics</option>
          <option value="Physics">Physics</option>
          <option value="Chemistry">Chemistry</option>
          <option value="Life Sciences">Life Sciences</option>
        </select>
      </div>

      <!-- Join Year  -->
     <div class="form-group">
       <label for="exampleFormControlInput1">Select the year of joining</label>
       <input type="number" class="form-control" id="join_year" placeholder="2018" name="join_year" required>
     </div>

     <!-- pass Year  -->
     <div class="form-group">
       <label for="exampleFormControlInput1">Select the year of passing</label>
       <input type="number" class="form-control" id="pass_year" placeholder="2018" name="pass_year" required>
     </div>

     <!-- Level of Study -->
    <div class="form-group">
      <label for="exampleFormControlSelect1">Level of Study</label>
      <select class="form-control" id="level" name="level" required>
        <option value="ug">Undergraduate</option>
        <option value="g">Graduate</option>
        <option value="d">Doctoral</option>
      </select>
    </div>

    <!-- Favourite Quote -->
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Add Your Favourite Quote</label>
      <textarea class="form-control" id="quote" rows="3" name="quote"></textarea>
    </div>

    <!-- Highlights -->
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Add Your Achievements</label>
      <textarea class="form-control" id="quote" rows="3" name="highlight"></textarea>
    </div>

  <!-- Submit Button -->
  <button type="submit" name="submit-button" class="btn btn-primary mb-2">Submit Details</button>
</form>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


  </div>
      <br>
      <br>
      <div class="col-lg-12">
        <footer class="main-block dark-bg" style="background: black; padding: 90px;">
          <div class="container-fluid">
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
