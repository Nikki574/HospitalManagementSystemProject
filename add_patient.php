<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    
    // Insert the new patient into the database
    $sql = "INSERT INTO patients (name, age, address, phone) VALUES ('$name', $age, '$address', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New patient added successfully<br>";
        
        // Retrieve the last inserted patient's data
        $last_id = $conn->insert_id;
        $sql_select = "SELECT id, name, age, address, phone FROM patients WHERE id = $last_id";
        $result = $conn->query($sql_select);
        
        if ($result->num_rows > 0) {
            // Output the data of the newly added patient
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . "<br>";
                echo "Name: " . $row["name"] . "<br>";
                echo "Age: " . $row["age"] . "<br>";
                echo "Address: " . $row["address"] . "<br>";
                echo "Phone: " . $row["phone"] . "<br>";
            }
        } else {
            echo "No patient data found.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
