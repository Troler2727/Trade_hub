<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>am Server</title>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>
    <?php
    
    $user_id = $_SESSION['user_id'];
    
    
    // bitte die Parameterwerte anpassen: 
    // 1)host:port, 2)user, 3)passwort, 4)datenbank
    // connection herstellen   
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
    
    // Daten auslesen und in HTML-Form ausgeben
    $sql = "select * from accountdata where account_id = '$user_id'";       
    $result = mysqli_query($conn, $sql); 
    ?>
    <h1><u>Deine Daten:</u></h1> 
    
    <div class="icon-demo mb-4 border rounded-3 d-flex align-items-center justify-content-center p-3 py-6" style="font-size: 10em" role="img" aria-label="People circle - large preview">
            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
    </div>
    <?php
     echo "<table class='table table-bordered table-hover table-striped'>";
        echo "<tr>";
            echo "<th class='info col-sm-6'>Username</th>";
		    echo "<th class='info col-sm-6'>Email</th>";
            echo "</tr>";
        
      while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
             $us = $row["account_username"];
             $em = $row["account_email"];
             echo "<td>" . $us . "</td>" ;
             echo "<td>" . $em . "</td>" ;
             echo "</tr>";
         }    
      echo "</table>";  
    
    echo "<p><center><a class='btn btn-primary btn-lg btn-block data-toggle='tooltip' data-placement='bottom' title='Zurück' href='main.php'>Zurück</a></center></p>";
    ?>
    </body>
   
</html>