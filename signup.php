<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

    // Basic validation
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert into database
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        
        if ($conn->query($query) === TRUE) {
            echo "Account created successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "Error: Please submit the form";
}

// Close connection
$conn->close();
?>
