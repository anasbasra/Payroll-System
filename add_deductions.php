<?php
require("db.php"); // Include your database connection file

// Get the deduction values from the POST request
$id = $_POST['deduction_id'];
$healthinsurance = $_POST['healthinsurance'];
$garnishments = $_POST['garnishments'];
$others = $_POST['others'];
$fica = $_POST['fica'];
$loans = $_POST['loans'];

// Prepare the SQL statement to update deductions
$sql = "UPDATE deductions SET garnishments = ?, others = ?, fica = ?, loans = ?, healthinsurance = ? WHERE deduction_id = ?";
$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind the parameters (assuming deduction_id is an integer)
$stmt->bind_param("sssssi", $garnishments, $others, $fica, $loans, $healthinsurance, $id);

// Execute the statement
if ($stmt->execute()) {
    ?>
    <script>
        alert('Deductions updated!');
        window.location.href = 'home_deductions.php';
    </script>
    <?php 
} else {
    echo "Something went wrong, Please try again!"; 
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>