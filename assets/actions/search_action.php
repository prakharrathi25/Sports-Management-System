<?php
    // Making a database connection
    $server = "localhost";
    $username = "root";
    $password = "mysql@123";
    $dbname = "sports-database";
    $conn = mysqli_connect($server, $username, $password, $dbname);

    if ($conn->connect_errno) {
        die("Failed to connect to MySQL: " . $conn->connect_error);
    }

    // Output to be displayed
    $output = '';

    if(isset($_POST['query'])){

        // Create a new filtered table
        $sql_create = "CREATE TABLE filter as (SELECT p.pid, p.picture, p.pname, p.Department as dept, t.teamName as team FROM playerDetails as p, teamDetails as t WHERE p.teamID = t.tID)";

        mysqli_query($conn, $sql_create) or die(mysqli_error($conn));

        $search = $_POST['query']; // Search query is stored

        // Fetch data from the filtered table
        $s_sql = "SELECT pid, picture, pname, dept, team FROM filter WHERE pname LIKE CONCAT('%','".$search."', '%')";

        // Additional search details like teams
        if(isset($_POST['team'])){
            $team = $_POST['team'];
            $s_sql .= "AND team ='".$team."' ";
        }

        // Send Query request
        $result = mysqli_query($conn, $s_sql) or die(mysqli_error($conn));

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

                // Ouptut which gets displayed
                $output .= '<div class="col-md-3 mb-2">
                    <div class="card-deck">
                    <a href="player.php?id='.$row['pid'].'">
                        <div class="card border-secondary">
                            <img src="'.$row['picture'].'" class="card-img-top">
                            <div class="card-img-overlay">
                                <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1">'.$row['pname'].' </h6>
                            </div>
                            <!-- Body of the content  -->
                            <div class="card-body">
                                <h4 class="card-title text-danger text-center">'.$row['team'].'</h4>
                                <p class="text-center">
                                    '.$row['dept'].'<br>
                                </p>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>';
            }
        } else{
            // If rows <= 0
            $output = "<h3> No Player Found! </h3>";
        }
        // Display output
        echo "$output";

        //Drop the table that has been created
        $sql_drop = "DROP TABLE filter";
        mysqli_query($conn, $sql_drop) or die(mysqli_error($conn));
    }
?>
