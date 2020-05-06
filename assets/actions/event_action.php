<?php
    // Making a server connection
    $server = "localhost";
    $username = "root";
    $password = "mysql@123";
    $dbname = "sports-database";
    $conn = mysqli_connect($server, $username, $password, $dbname);

    if ($conn->connect_errno) {
        die("Failed to connect to MySQL: " . $conn->connect_error);
    }

    // Declare global teams array
    $teams = array(
        1=> "Panthers",
        2=> "Bulls",
        3=> "Phoenix",
        4=> "Falcons",
    );

    if(isset($_POST['action'])){
        // First create a new filtered table
        $sql_create = "CREATE TABLE filter as (SELECT events.eventID as id, events.teamA, events.teamB, events.Date, sportdetails.sName as sport, sportdetails.sport_logo as logo FROM events, sportdetails WHERE sportdetails.sID = events.sport)";
        //
        mysqli_query($conn, $sql_create) or die(mysqli_error($conn));

        // Fetch data from the filtered table
        $sql = "SELECT id, logo, sport, teamA, teamB, Date FROM filter WHERE sport !='' ";

        // Filters for each attriute
        if(isset($_POST['team'])){
            $team = implode("','", $_POST['team']);
            $sql .= "AND (teamA IN('".$team."')";
        }

        if(isset($_POST['team'])){
            $team = implode("','", $_POST['team']);
            $sql .= "OR teamB IN('".$team."'))";
        }

        if(isset($_POST['sport'])){
            $sport = implode("','", $_POST['sport']);
            $sql .= "AND sport IN('".$sport."')";
        }

        // Send SQL query to filter
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $output = '';

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

                // Ouptut which gets displayed
                $output .= '<div class="col-md-3 mb-2">
                    <div class="card-deck">
                    <a href="player.php?id='.$row['id'].'">
                        <div class="card border-secondary">
                            <img src="'.$row['logo'].'" class="card-img-top">
                            <div class="card-img-overlay">
                                <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1">'.$row['sport'].' </h6>
                            </div>
                            <!-- Body of the content  -->
                            <div class="card-body">
                                <h4 class="card-title text-danger text-center">'.$row['Date'].'</h4>
                                <p class="text-center">
                                    '.$row['teamA'].' vs '.$row['teamB'].'<br>
                                </p>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>';
            }
        } else{
            // If rows <= 0
            $output = "<h3> No Event Found! </h3>";
        }
        // Display output
        echo "$output";

        //Drop the table that has been created
        $sql_drop = "DROP TABLE filter";
        mysqli_query($conn, $sql_drop) or die(mysqli_error($conn));
    }
 ?>
