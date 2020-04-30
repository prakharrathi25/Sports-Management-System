<?php
    require 'dbh.php';

    if(isset($_POST['action'])){
        $sql = "SELECT p.pname, p.gender, p.Department, p.level, s.sName, t.teamName FROM playerDetails as p, teamDetails as t, sportDetails as s WHERE team !='' ";

        // Filters for each attriute
        if(isset($_POST['team'])){
            $team = implode("','", $_POST['team']);
            $sql .= "AND team IN('".$team."')"
        }

        if(isset($_POST['gender'])){
            $gender = implode("','", $_POST['gender']);
            $sql .= "AND team IN('".$gender."')";
        }

        if(isset($_POST['sport'])){
            $sport = implode("','", $_POST['sport']);
            $sql .= "AND team IN('".$sport."')";
        }

        if(isset($_POST['dept'])){
            $dept = implode("','", $_POST['dept']);
            $sql .= "AND team IN('".$dept."')";
        }

        if(isset($_POST['level'])){
            $level = implode("','", $_POST['level']);
            $sql .= "AND team IN('".$level."')";
        }

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $output = '';

        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){

                // Ouptut which gets displayed
                $output .= '<div class="col-md-3 mb-2">
                    <div class="card-deck">
                        <div class="card border-secondary">
                            <img src="'.$row['picture'].'" class="card-img-top">
                            <div class="card-img-overlay">
                                <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1">'.$row['pname'].' </h6>
                            </div>
                            <!-- Body of the content  -->
                            <div class="card-body">
                                <h4 class="card-title text-danger text-center">'.$row['teamName'].'</h4>
                                <p class="text-center">
                                    '.$row['Department'].'<br>
                                </p>
                                <a href="#" class="btn btn-success btn-block"> Look at the player</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else{
            // If rows <= 0
            $output = "<h3> No Player Found! </h3>";
        }
    }
 ?>
