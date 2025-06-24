<?php 

$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "1tropical_nomad";

$conn = mysqli_connect($servername, $username, $password, $dbname); 

if (!$conn) {

  die("Connection failed: " . mysqli_connect_error() . "<br><br>");
  
}


ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([

  "lifetime" => 1800,
  "domain" => "localhost",
  "path" => "/",
  "secure" => true,
  "httponly" => true,

]);

session_start();

if (!isset($_SESSION["last_regenration"])){

session_regenerate_id(true);
$_SESSION["last_regenration"] = time();

} else{

$interval= 60 * 30;

if (time() - $_SESSION["last_regenration"] >= $interval){

  session_regenerate_id(true);
  $_SESSION["last_regenration"] = time();

}

}

?>