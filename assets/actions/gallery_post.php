<?php

    // Check if the button was pressed
    if (isset($POST['picture-submit'])) {
        echo "Entered"; 
        // Get the inputs
        $newfilename =  'gallery';
        $title = $_POST['title'];
        $description = $_POST['description'];

        $file = $_FILES['file'];
        if($file){
            echo "FILE";
        }else{
            echo "No File";
        }
        console.log($file);

        // Obtaining some file information
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        // Checking file extensions
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        echo "$fileActualExt";

        // Allowed extensions
        $allowed = array('jpeg', 'jpg', 'png', 'JPG');

        // if extension is allowed in_array($fileActualExt, $allowed)
        if(1==1){
            // check if any error
            if($fileError === 0){
                    // Creating a unique file name
                    $fileNew = $newfilename. "." . uniqid('', true) . "." . $fileActualExt;
                    $fileDest = "assets/images/gallery/" . $fileNew;

                    // Function to upload file
                    move_uploaded_file($fileTmpName, $fileDest);

                    // Making a database connection
                    $server = "localhost";
                    $username = "root";
                    $password = "mysql@123";
                    $dbname = "sports-database";
                    $conn = mysqli_connect($server, $username, $password, $dbname);

                    if ($conn->connect_errno) {
                        die("Failed to connect to MySQL: " . $conn->connect_error);
                    }
                    $stmt = mysqli_stmt_init($conn);

                    // Move to the database as well using prepared statements
                    $sql = "INSERT into gallery(location, title, description) VALUES(?, ?, ?)";
                    echo $sql;

                    // Binding parameters
                    mysqli_stmt_bind_param($stmt, "sss", $fileDest, $title, $description);
                    mysqli_stmt_execute("$stmt");

                    // Perform a query, check for error
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    echo "Query Sent";

                    header("Location: ../gallery.php?upload=sucess");

            }else {
                echo "There was an error in file upload.";
            }
        }else {
            echo "You cannnot upload files of this type!";
        }
    }

?>
