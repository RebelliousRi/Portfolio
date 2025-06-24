<?php

include_once 'config.php';
require_once 'encryption.php';
require_once 'encryption_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (!isset($_POST['glucose']) || !isset($_POST['time'])) {
        echo "Please fill in all required fields.";
        exit();
    }

    $glucose = $_POST['glucose'];
    $time = $_POST['time'];
    $patient_id = $_SESSION['patient_id'];

    if ($glucose <= 0) {
        echo "Please enter a valid glucose reading.";
        exit();
    }

    // Encrypt the glucose value
    $encryptedGlucose = encryptData($glucose);

    $stmt = $conn->prepare("INSERT INTO patient_glucose (patient_id, glucose, time) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", 
        $patient_id, 
        $encryptedGlucose,
        $time
    );
    
    if ($stmt->execute()) {
        header("Location: ../glucose.php?message=Glucose reading recorded successfully!");
    } else {
        echo "Error recording glucose reading: " . $stmt->error;
    }
    
    $stmt->close();
}
?>