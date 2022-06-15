<?php
session_start();
?>

    <?php
        $user = $_POST["us"];
        $pw = $_POST["pw"];
        
     
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
        
    $sql = "select * from accountdata where account_username = '$user' and account_password = '$pw'"; 
    
        $result=mysqli_query($conn, $sql);
        $rowcount=mysqli_num_rows($result);
        
        if($rowcount == 1){
            $row = mysqli_fetch_assoc($result);
            //print_r($row);
            $_SESSION["user_id"] = $row["account_id"];
            $_SESSION["username"] = $row["account_username"];
            //echo "OK";
            header("Location: main.php");
        }else{
           // echo "NOT OK ";
            header("Location: login.html");
        }
        
    mysqli_close($conn);
    ?>