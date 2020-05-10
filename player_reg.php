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

?>
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
      </ul>
  </nav>
</div>
<h1> Registration Confirmation </h1>

<?php
    // Check if the submit button was pressed
    if (isset($_POST['submit-button'])){
        // Dealing with image data
        $file = $_FILES['plr_img'];

        // Obtaining some file information
        $fileName = $_FILES['plr_img']['name'];
        $fileTmpName = $_FILES['plr_img']['tmp_name'];
        $fileSize = $_FILES['plr_img']['size'];
        $fileError = $_FILES['plr_img']['error'];
        $fileType = $_FILES['plr_img']['type'];

        // Checking file extensions
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        // Allowed extensions
        $allowed = array('jpeg', 'jpg', 'png');

        // if extension is allowed
        if (in_array($fileActualExt, $allowed)){
            // check if any error
            if($fileError === 0){
                    // Creating a unique file name
                    $fileNew = uniqid('', true).".".$fileActualExt;
                    $fileDest = 'assets/uploads/'.$fileNew;

                    // Function to upload file
                    move_uploaded_file($fileTmpName, $fileDest);
            }else {
                echo "There was an error in file upload.";
            }
        }else {
            echo "You cannnot upload files of this type!";
        }

        // Declare other input variables
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
        $high = $_POST['highlight'];
        $captain = (int)$_POST['captain'];

        if($match_num > 0 && $win_num > 0){
            $rating = (($win_num * 100)/$match_num);
        }

        // Testing the inputs
        echo "$fileDest" . "<br>";
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

        $sql = "INSERT INTO playerDetails(pname, Gender, playedMatches, wins, picture, primarysportID, secondarySportID, rating, teamID, managerID, lastBid, Department, YearofJoining, LevelofStudy, YearofPassing, quote, isCaptain, highlight) VALUES('$name', '$gender', $match_num, $win_num, '$fileDest', $p_sport, $s_sport, $rating, $team, $manager, $bid, '$dept', $join_year,  '$level', $pass_year, '$quote', $captain, '$high')";

        // Perform a query, check for error
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
?>

<div class="jumbotron text-xs-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Your entry has been stored!</strong></p>
  <hr>
  <p>
    View Players? <a href="all_players.php">Add More</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
  </p>
</div>
