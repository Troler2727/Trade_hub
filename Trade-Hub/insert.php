<!DOCTYPE html>
<html>
<head>
    <title>Am Server</title>
    </head>
    <body>
    <?php
        $name = $_POST["us"];
        $pw = $_POST["pw"];
        $email = $_POST["em"]; 
     
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tradehub";
   
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ( ! $conn) {
       die("Connection failed: " . mysqli_connect_error());
    }
    // Change character set to utf8
    mysqli_set_charset($conn,"utf8"); 
        
    $sql = "insert into accountdata values ( null, '$name', '$pw', '$email')"; 
    if (mysqli_query($conn, $sql)) {
         header("Location: index.php");
    } else {
         header("Location: error.php");
    }

    mysqli_close($conn);    
      
    ?>
        </body>
    </html>