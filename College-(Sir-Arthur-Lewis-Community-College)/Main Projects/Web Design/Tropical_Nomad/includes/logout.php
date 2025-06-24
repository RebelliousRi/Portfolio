<?php

session_start();

session_unset();

session_destroy();

header("Location: http://localhost/Xamp/Assignments/PHP-SQL_Project/index1.php?message=You have successfully logged out.");

exit();

?>