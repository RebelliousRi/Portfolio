<?php

include_once 'config.php';
require_once 'encryption.php';
require_once 'encryption_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (!isset($_POST['HDL']) || !isset($_POST['LDL']) || !isset($_POST['triglycerides']) || !isset($_POST['time'])) {
        echo "Please fill in all required fields.";
        exit();
    }

    $HDL = $_POST['HDL'];
    $LDL = $_POST['LDL'];
    $triglycerides = $_POST['triglycerides'];
    $time = $_POST['time'];
    $patient_id = $_SESSION['patient_id'];

    if ($HDL <= 0 || $LDL <= 0 || $triglycerides <= 0) {
        echo "Please enter a valid cholesterol levels.";
        exit();
    }

    $total_cholesterol = $HDL + $LDL + $triglycerides;

    // Encrypt all values
    $encryptedHDL = encryptData($HDL);
    $encryptedLDL = encryptData($LDL);
    $encryptedTriglycerides = encryptData($triglycerides);
    $encryptedTotal = encryptData($total_cholesterol);

    $stmt = $conn->prepare("INSERT INTO patient_cholesterol (patient_id, hdl, ldl, triglycerides, total_cholesterol, time) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", 
        $patient_id, 
        $encryptedHDL,
        $encryptedLDL,
        $encryptedTriglycerides,
        $encryptedTotal,
        $time
    );
    
    if ($stmt->execute()) {
        header("Location: ../cholesterol.php?total_cholesterol=$total_cholesterol&message=Cholesterol levels recorded successfully!");
    } else {
        echo "Error recording cholesterol levels: " . $stmt->error;
    }
    
    $stmt->close();
}
?>