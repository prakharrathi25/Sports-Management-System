<?php
    include_once 'includes/dbh.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>Player Reg Form</title>
</head>

<body>



<?php
    $sql = "INSERT INTO playerDetails VALUES(NULL,
                                            $name,
                                            $gender,
                                            $match_num,
                                            $win_num,
                                            NULL,
                                            $p_sport,
                                            $s_sport,
                                            $rating,
                                            $team,
                                            $team,
                                            $bid,
                                            $dept,
                                            $join_year,
                                            $level,
                                            $pass_year,
                                            $quote)";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['pname'] . "<br>";
        }
    }

?>

</body>
</html>
