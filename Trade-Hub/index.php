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
    
    $sql = "SELECT account_id, account_username, account_password,  account_email FROM accountdata";       
    $result = mysqli_query($conn, $sql);  
        
    ?>  
    <h1><u>Accountdaten:</u></h1> 
        
    <?php
      echo "<table class='table table-bordered table-hover table-striped'>";
        echo "<tr>";
            echo "<th class='info col-sm-3'>ID</th>";
            echo "<th class='info col-sm-6'>E-mail</th>";
		    echo "<th class='info col-sm-3'>Abmelden</th>";
            echo "</tr>";
      while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
             $news_id = $row["news_id"];
             $em = $row["email"];
             echo "<td>" . $news_id . "</td>" ;
             echo "<td>" . $em . "</td>" ;
             echo "<td><center><a class='btn btn-danger data-toggle='tooltip' data-placement='bottom' title='Abmelden' href='delete.php?news_id=$news_id&email=$em'>Abmelden</a></center></td>";
             echo "</tr>";
         }    
      echo "</table>";  
      
        
    echo "<p><center><a class='btn btn-primary btn-lg btn-block data-toggle='tooltip' data-placement='bottom' title='Einfügen' href='einfuegen.html'>Einfügen</a><center></p>"; 
        
    echo "<p><center><a class='btn btn-primary btn-lg btn-block data-toggle='tooltip' data-placement='bottom' title='Zurück zur Hauptseite' href='main.html'>Zurück zur Hauptseite</a></center></p>";
        
    echo "<p><center><a class='btn btn-primary btn-lg btn-block data-toggle='tooltip' data-placement='bottom' title='Aktualisieren' onclick='loadDoc()'>Aktualisieren</a></center></p>";
    echo "<div id='table'></div>";
        
    // mysqli_close($conn);
       
    ?>
        <script>
         function arr2Table(arr) {
            let txt = '<table class="table table-bordered table-hover">';
            // für jedes Objekt im Array
            for (let i=0; i < arr.length; i++) {
                let obj = arr[i];
                txt += "<tr>";  // Neue Zeile in der Tabelle
                // für jedes Attribut des Objektes
                for (let x in obj) {
                    txt += '<td>' + obj[x] + '</td>';
                }
                txt += "</tr>";
            }
            txt += '</table>';
            // alert(txt);
            return txt;
        }    
            
        function loadDoc() {
         const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                let arr = JSON.parse(this.responseText);
                let html = arr2Table(arr);
                // in Seite einbauen
                document.getElementById("table").innerHTML = html;
                };
           xhttp.open("GET", "datenholenAlsJSON.php?t=" + Math.random());
           xhttp.send();
}
        </script>
    </body>
</html>