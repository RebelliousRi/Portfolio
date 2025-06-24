<?php

include_once 'config.php';

if (!isset($_SESSION['username'])) {

    header("Location: http://localhost/Xamp/Assignments/PHP-SQL_Project/index1.php?message=Only logged in administrators can register new admins.");

    exit();

} else {

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = $_POST["pwd"];  
    
    if (empty("username") || empty("pwd")) {
    
        echo ("Input fields cannot be left blank.");
        
        
        }  else {


$options = [
'cost' => 12
];

$hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

            $sql = "INSERT INTO admins(username, pwd)

            VALUES(
            
                '$username',
                '$hashedpwd'
                
                )";
            
            $result = mysqli_query($conn, $sql);
            
            if ($result){
            
                echo "Registration successful! Welcome " . $username .  "<br>";
                
            }else{ 
                
                echo "Please try again registration was unsuccesful due to an error: " . mysqli_error($conn) . "<br>";
            
            }

        }

    }

}



?>