<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    
    // Insert the new doctor into the database
    $sql = "INSERT INTO doctors (name, specialty, phone) VALUES ('$name', '$specialty', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New doctor added successfully<br>";
        
        // Retrieve the last inserted doctor's data
        $last_id = $conn->insert_id;
        $sql_select = "SELECT id, name, specialty, phone FROM doctors WHERE id = $last_id";
        $result = $conn->query($sql_select);
        
        if ($result->num_rows > 0) {
            // Output the data of the newly added doctor
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . "<br>";
                echo "Name: " . $row["name"] . "<br>";
                echo "Specialty: " . $row["specialty"] . "<br>";
                echo "Phone: " . $row["phone"] . "<br>";
            }
        } else {
            echo "No doctor data found.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
