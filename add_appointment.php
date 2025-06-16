<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    
    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date) VALUES ($patient_id, $doctor_id, '$appointment_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New appointment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
