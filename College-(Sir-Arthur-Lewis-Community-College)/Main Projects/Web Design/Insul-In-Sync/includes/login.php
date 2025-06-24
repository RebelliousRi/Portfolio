<?php


session_start();
session_destroy();

include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $acctype = $_POST["acctype"];
    $pwd = $_POST["pwd"];

    if ($acctype == 'patient') {
        $sql = "SELECT * FROM patients WHERE username = '$username'";
    } else if ($acctype == 'care_giver') {
        $sql = "SELECT * FROM care_givers WHERE username = '$username'";
    }

    $login = mysqli_query($conn, $sql);

    if (mysqli_num_rows($login) === 1) {
        $row = mysqli_fetch_assoc($login);


        if (password_verify($pwd, $row['pwd'])) {

            $_SESSION['username'] = $username;
            $_SESSION['acctype'] = $acctype;
            
            if ($acctype == 'patient') {
                $_SESSION['patient_id'] = $row['id'];
            } else if ($acctype == 'care_giver') {
                $_SESSION['caregiver_id'] = $row['id'];
            }

            header("Location: http://localhost/Xamp/Assignments/Technical_Project/index1.php?message=Log in successful!");

            exit();

        } else {

            echo "Invalid username or password.";
        }
    } else {

        echo "Invalid username or password.";
    }
}
?>
