<?php
session_start(); 
//$_SESSION["newsession"]="a"; 

$category = $_REQUEST['Category'];
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





$allowed_files = [
    'image/jpeg' => 'jpg',
    'image/gif' => 'gif',
    'image/png' => 'png'
  
  ];

if ( ! empty($_FILES) )  {
 
$upload_dir = "upload\\";
do {
    $new_filename = md5(uniqid($_FILES['datei']['tmp_name'], true)) . '.' . $allowed_files[$_FILES['datei']['type']];
    //$category = 'Category';
  } while (file_exists($new_filename));
  move_uploaded_file($_FILES['datei']['tmp_name'], $upload_dir.$new_filename);
  $v1 = "a";$v2 = "b";$v3 = "c";$v4 = 0;
  //$ses = $_SESSION["newsession"];
  $ses = 1;
  //$sql = "insert into picture values ('" .$v1.  "', '" . $v2 . "', '" . $v3 . "', " . $v4 .")"; 

  $sql2 = "insert into picture values ('$new_filename', '$category', $ses)"; 
 // echo $sql;
 // echo $sql2;
 mysqli_query($conn,$sql2);
}
else{
echo'Es wurde keine Datei ausgewählt!';
}
?>

