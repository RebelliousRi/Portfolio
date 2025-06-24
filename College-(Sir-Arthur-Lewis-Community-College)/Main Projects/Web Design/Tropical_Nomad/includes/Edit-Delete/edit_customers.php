<?php

include_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the tour
    $sql = "SELECT * FROM customers WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $customer = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $update_sql = "UPDATE customers SET 
        fname='$fname', 
        lname='$lname',         
        email='$email', 
        phone='$phone' 
        WHERE id='$id'";

    if (mysqli_query($conn, $update_sql)) {

        header("Location: http://localhost/Xamp/Assignments/PHP-SQL_Project/customers.php?message=Tour updated successfully!");

        exit();

    } else {
        echo "Record was not updated due to an error: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Tour</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
    First Name: <input type="text" name="fname" value="<?php echo $customer['fname']; ?>"><br><br>
    Last Name: <input type="text" name="lname" value="<?php echo $customer['lname']; ?>"><br><br>
    Email: <input type="text" name="email" value="<?php echo $customer['email']; ?>"><br><br>
    Phone Number: <input type="text" name="phone" value="<?php echo $customer['phone']; ?>"><br><br>
    <button type="submit">Update</button>
</form>
