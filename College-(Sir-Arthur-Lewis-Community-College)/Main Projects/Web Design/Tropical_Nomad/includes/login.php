<?php

//Destroys any sessions of a previous user

session_start();

session_destroy();

include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = mysqli_real_escape_string($conn, $_POST['username']);

    
    if (empty("username") || empty("pwd")) {
    
        echo ("Input fields cannot be left blank.");
        
        
        }  else {

            if ($username == "Alpha"){

                $pwd = md5($_POST["pwd"]);

                $sql = "SELECT*FROM admins
                WHERE username = '$username' 
                AND pwd = '$pwd'";

            } else {

                $pwd = $_POST["pwd"]; 

            $options = [

                'cost' => 12
                ];
                
                $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

            $sql = "SELECT*FROM admins
            WHERE username = '$username' 
            AND pwd = '$hashedpwd'";
            
            }

            $login = mysqli_query($conn, $sql);
            
            $logincheck = mysqli_num_rows($login);
            
            if ($logincheck == 1){
                $_SESSION["username"]=$username;
                header("Location: http://localhost/Xamp/Assignments/PHP-SQL_Project/dashboard.php");

                exit();
            
            }

            else {
        
                echo ("Invalid username or password. If you wish to register a new admin, please get an existing logged in administrator to do.");
        
            }

        }

    }
    
    ?>