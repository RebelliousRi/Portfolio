<?php

include_once 'config.php';

session_unset();

if (session_destroy()) {
    header("Location: http://localhost/Xamp/Assignments/Technical_Project/index1.php?message=You have successfully logged out.");
    exit();
} else {
    header("Location: http://localhost/Xamp/Assignments/Technical_Project/index1.php?message=Error logging out. Please try again.");
    exit();
}

?>
