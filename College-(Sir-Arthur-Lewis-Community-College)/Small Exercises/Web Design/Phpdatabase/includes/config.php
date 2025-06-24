<?php 

//Step 1 Declare Variables

$servername = "localhost"; 
$username = "root"; 
$pwd = ""; //Usually Blank
$dbname = "1php_database";

//Step 2 Create Connection

$conn = mysqli_connect($servername, $username, $pwd, $dbname); 

//Step 3 Test Connection 

if (!$conn) {

  die("Connection failed: " . mysqli_connect_error() . "<br><br>");
  
}else

{

echo "Connected successfully <br><br>";

}

?>