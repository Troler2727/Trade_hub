<?php       
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
    $resultset = mysqli_query($conn,
    "SELECT * FROM accountdata"); 

    
    // NEU: JSON statt HTML!!!
    $rows = array();    // leeres Array anlegen
    
    // $r wird zeilenweise als assoziatives Array gelesen.
    while($r = mysqli_fetch_assoc($resultset)) {  
        // Assoziatives Array:
        // Key im Array ist keine Zahl, nicht arrayname[zahl]
        // sondern der feldname wird für Zugriff verwendet: arrayname[feldname]
        // (wird beim "json_encode" eine JavaScript Objekt. )
        // Assoziatives Array wir ans "normale" Array rows angehängt
        $rows[] = $r;
    }
    // JSON Codierung durchführen
    echo json_encode($rows);
    
    mysqli_close($conn);  
?>