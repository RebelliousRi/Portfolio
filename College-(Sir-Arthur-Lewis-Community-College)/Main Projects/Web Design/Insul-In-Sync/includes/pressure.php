<?php

include_once 'config.php';
require_once 'encryption.php';
require_once 'encryption_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (!isset($_POST['systolic']) || !isset($_POST['diastolic']) || !isset($_POST['heart_rate']) || !isset($_POST['time'])) {
        echo "Please fill in all required fields.";
        exit();
    }

    $systolic = (double)$_POST['systolic'];
    $diastolic = (double)$_POST['diastolic'];
    $heart_rate = (double)$_POST['heart_rate'];
    $time = $_POST['time'];
    $patient_id = $_SESSION['patient_id'];

    if ($systolic <= 0 || $diastolic <= 0 || $heart_rate <= 0) {
        echo "Please enter a valid pressure and heart rate.";
        exit();
    }

    // Encrypt each value individually
    $encryptedSystolic = encryptData((string)$systolic);
    $encryptedDiastolic = encryptData((string)$diastolic);
    $encryptedHeartRate = encryptData((string)$heart_rate);

    $stmt = $conn->prepare("INSERT INTO patient_pressure (patient_id, systolic, diastolic, heart_rate, time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", 
        $patient_id, 
        $encryptedSystolic,
        $encryptedDiastolic,
        $encryptedHeartRate,
        $time
    );
    
    if ($stmt->execute()) {
        header("Location: ../pressure.php?message=Pressure and heart rate recorded successfully!");
    } else {
        echo "Error recording pressure and heart rate: " . $stmt->error;
    }
    
    $stmt->close();
}
?>