    <?php
        $news_id = $_GET["news_id"]; 
        $email = $_GET["em"]; 
     
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web3bg1";
   
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ( ! $conn) {
       die("Connection failed: " . mysqli_connect_error());
    }
    // Change character set to utf8
    mysqli_set_charset($conn,"utf8"); 
        
    $sql = "delete from newsletter where news_id ='$news_id'"; 
    if (mysqli_query($conn, $sql)) {
         header("Location: index.php");
    } else {
         header("Location: error.php");
    }

    mysqli_close($conn);    
      
    ?>