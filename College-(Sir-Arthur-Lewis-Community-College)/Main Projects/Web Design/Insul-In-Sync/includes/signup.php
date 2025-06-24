<?php

include_once 'config.php';
require_once 'encryption.php';
require_once 'encryption_config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $acctype = mysqli_real_escape_string($conn, $_POST['acctype']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = $_POST['pwd']; // Don't escape password before hashing
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    

$options = ['cost' => 12];
$hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    if ($acctype == 'patient') {
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $insulin = mysqli_real_escape_string($conn, $_POST['insulin']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $height = mysqli_real_escape_string($conn, $_POST['height']);
        $weight = mysqli_real_escape_string($conn, $_POST['weight']);
        $conditions = mysqli_real_escape_string($conn, $_POST['conditions']);
        $em_name = mysqli_real_escape_string($conn, $_POST['em_name']);
        $em_address = mysqli_real_escape_string($conn, $_POST['em_address']);
        $em_phone = mysqli_real_escape_string($conn, $_POST['em_phone']);

        // Encrypt only medical data
        $medicalData = [
            'dob' => $dob,
            'insulin' => $insulin,
            'type' => $type,
            'height' => $height,
            'weight' => $weight,
            'conditions' => $conditions
        ];

        $encryptedData = encryptArray($medicalData, array_keys($medicalData));

    $sql = "INSERT INTO patients (
            acctype, username, pwd, firstname, lastname, gender, 
        address, email, phone,
            dob, insulin, type, height, weight, conditions,
        em_name, em_address, em_phone
    ) VALUES (
            '$acctype', '$username', '$hashedpwd', '$firstname', '$lastname', '$gender',
        '$address', '$email', '$phone',
            '" . $encryptedData['dob'] . "', 
            '" . $encryptedData['insulin'] . "', 
            '" . $encryptedData['type'] . "', 
            '" . $encryptedData['height'] . "', 
            '" . $encryptedData['weight'] . "', 
            '" . $encryptedData['conditions'] . "',
        '$em_name', '$em_address', '$em_phone'
    )";
    } else if ($acctype == 'care_giver') {
        
        $qualification = isset($_POST['qualification']) ? mysqli_real_escape_string($conn, $_POST['qualification']) : '';
        $experience = isset($_POST['experience']) ? mysqli_real_escape_string($conn, $_POST['experience']) : '0';
        $specialization = isset($_POST['specialization']) ? mysqli_real_escape_string($conn, $_POST['specialization']) : '';

    $sql = "INSERT INTO care_givers (
        acctype, username, pwd, firstname, lastname,
        gender, qualification, experience, specialization,
        address, email, phone
    ) VALUES (
        '$acctype', '$username', '$hashedpwd', '$firstname', '$lastname',
        '$gender', '$qualification', '$experience', '$specialization',
        '$address', '$email', '$phone'
    )";
    }

    
    $result = mysqli_query($conn, $sql);

    if ($result) {
                $_SESSION['username'] = $username;
                $_SESSION['acctype'] = $acctype;
                
                if ($acctype == 'patient') {
                    $id_query = "SELECT id FROM patients WHERE username = '$username'";
                    $id_result = mysqli_query($conn, $id_query);
                    if ($id_row = mysqli_fetch_assoc($id_result)) {
                        $_SESSION['patient_id'] = $id_row['id'];
                    }
                } else if ($acctype == 'care_giver') {
                    $id_query = "SELECT id FROM care_givers WHERE username = '$username'";
                    $id_result = mysqli_query($conn, $id_query);
                    if ($id_row = mysqli_fetch_assoc($id_result)) {
                        $_SESSION['caregiver_id'] = $id_row['id'];
                    }
                }

                header("Location: http://localhost/Xamp/Assignments/Technical_Project/index1.php?message=Sign up successful!");
        exit();
    } else {
        header("Location: http://localhost/Xamp/Assignments/Technical_Project/signup.php?error=Sign up failed");
                exit();
            }
        }
?>
