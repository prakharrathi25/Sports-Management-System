<?php
    include 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Statistics</title>
    </head>
    <body>

        <!--- Gender Query -->
        <?php
        $gender_sql = "SELECT Gender, COUNT(*) from playerdetails GROUP BY Gender";
        $result = mysqli_query($conn, $gender_sql) or die(mysqli_error($conn));
        $gender_data = array();

        // loop through the returned data
        foreach ($result as $row){
            $gender_data[] = $row;
        }

        // free memory associated with the $result
        $result->close();

        // Convert Data to JSON format
        print json_encode($gender_data);
        ?>


        <!--- Page Structure -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div id="chart-container" class="">
                        <canvas id="mycanvas" width="300" height="300"></canvas>
                    </div>
                </div>
            </div>

        </div>


        <!--- JS Import --->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js" integrity="sha256-8zyeSXm+yTvzUN1VgAOinFgaVFEFTyYzWShOy9w7WoQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha256-TQq84xX6vkwR0Qs1qH5ADkP+MvH0W+9E7TdHJsoIQiM=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" integrity="sha256-nZaxPHA2uAaquixjSDX19TmIlbRNCOrf5HO1oHl5p70=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/js/stats.js">

        </script>
    </body>
</html>
