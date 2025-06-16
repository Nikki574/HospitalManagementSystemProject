<?php
// Database connection parameters
$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$dbname = "hospital_management"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all records from the doctors table
$sql = "SELECT id, name, specialty, phone FROM doctors";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Start of the HTML table
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Specialty</th><th>Phone</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["specialty"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "</tr>";
    }

    // End of the HTML table
    echo "</table>";
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>
