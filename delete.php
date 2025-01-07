<?php 
require('db.php'); // Include your database connection file

// Get the employee ID from the URL
$id = $_GET['emp_id'];

// Prepare the SQL statement to delete the employee
$query = "DELETE FROM employee WHERE emp_id = ?";
$stmt = $conn->prepare($query);

// Check if the statement was prepared successfully
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind the parameter (assuming emp_id is an integer)
$stmt->bind_param("i", $id);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to the employee home page after successful deletion
    header("Location: home_employee.php");
    exit; // Always exit after a header redirect
} else {
    // Handle error if the deletion fails
    die("Error executing query: " . $stmt->error);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>