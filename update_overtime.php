<?php
require("db.php"); // Include your database connection file

// Get the overtime values from the POST request
$id = $_POST['ot_id'];
$overtime = $_POST['rate'];

// Prepare the SQL statement to update the overtime rate
$sql = "UPDATE overtime SET rate = ? WHERE ot_id = ?";
$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind the parameters (assuming ot_id is an integer)
$stmt->bind_param("di", $overtime, $id); // "d" for double (float), "i" for integer

// Execute the statement
if ($stmt->execute()) {
    ?>
    <script>
        alert('Overtime Rate has been updated!');
        window.location.href = 'home_salary.php';
    </script>
    <?php 
} else {
    echo "Something went wrong!"; 
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>