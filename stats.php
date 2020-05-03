<?php
    include 'dbh.php';

    // Gender Query
    $gender_sql = "SELECT Gender, COUNT(*) from playerdetails GROUP BY Gender";
    $result = mysqli_query($conn, $gender_sql) or die(mysqli_error($conn));
    $data = array();
    
    // loop through the returned data
    foreach ($result as $row){
        echo $row['Gender'];
        array_push($data, $row);
    }

    // free memory associated with the $result
    $result->close();

    // // Team query
    // $team_sql = "SELECT teamdetails.teamName, COUNT(*) from playerdetails, teamdetails WHERE teamdetails.tid = playerdetails.teamID GROUP BY teamdetails.teamName ORDER BY teamdetails.tid";
    //
    // $result = mysqli_query($conn, $team_sql) or die(mysqli_error($conn));
    //
    // // loop through the returned data
    // foreach ($result as $row){
    //     array_push($data, $row);
    // }
    //
    // // free memory associated with the $result
    // $result->close();
    //
    // // Sport Query
    // $sport_sql = "SELECT sportdetails.sName, COUNT(*) from playerdetails, sportdetails WHERE sportdetails.sID = playerdetails.primarySportID GROUP BY sportdetails.sName ORDER BY sportdetails.sID";
    //
    // $result = mysqli_query($conn, $sport_sql) or die(mysqli_error($conn));
    //
    // // loop through the returned data
    // foreach ($result as $row){
    //     array_push($data, $row);
    // }
    //
    // // free memory associated with the $result
    // $result->close();
    //
    // // Convert Data to JSON format and print it
    echo json_encode($data);
    echo gettype($data);

    ?>
