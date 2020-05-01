<?php
    require 'dbh.php';

    if(isset($_POST['action'])){

        // First create a new filtered table
        $sql_create = "CREATE TABLE filter as (SELECT p.pid, p.picture, p.pname, p.gender as gender, p.Department as dept, p.levelOfStudy as level, s.sName as sport, t.teamName as team FROM playerDetails as p, teamDetails as t, sportDetails as s WHERE p.teamID = t.tId AND s.sID = p.primarysportID)";
        mysqli_query($conn, $sql_create) or die(mysqli_error($conn));

        // Fetch data from the filtered table
        $sql = "SELECT pid, picture, pname, gender, dept, level, sport, team FROM filter WHERE team !='' ";

        // Filters for each attriute
        if(isset($_POST['team'])){
            $team = implode("','", $_POST['team']);
            $sql .= "AND team IN('".$team."')";
        }

        if(isset($_POST['gender'])){
            $gender = implode("','", $_POST['gender']);
            $sql .= "AND gender IN('".$gender."')";
        }

        if(isset($_POST['sport'])){
            $sport = implode("','", $_POST['sport']);
            $sql .= "AND sport IN('".$sport."')";
        }

        if(isset($_POST['dept'])){
            $dept = implode("','", $_POST['dept']);
            $sql .= "AND dept IN('".$dept."')";
        }

        if(isset($_POST['level'])){
            $level = implode("','", $_POST['level']);
            $sql .= "AND level IN('".$level."')";
        }
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $output = '';

        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){

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
