<?php       
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
    $resultset = mysqli_query($conn,
    "SELECT picture_name FROM picture"); 

    
    $rows = array();    
    while($r = mysqli_fetch_assoc($resultset)) {  
        $rows[] = $r;
    }   
    echo json_encode($rows);
    
    mysqli_close($conn);  
?>
