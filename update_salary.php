<?php
require("db.php"); // Include your database connection file

// Get the salary values from the POST request
$id = $_POST['salary_id'];
$salary = $_POST['salary_rate'];

// Prepare the SQL statement to update the salary
$sql = "UPDATE salary SET salary_rate = ? WHERE salary_id = ?";
$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind the parameters (assuming salary_id is an integer)
$stmt->bind_param("di", $salary, $id); // "d" for double (float), "i" for integer

// Execute the statement
if ($stmt->execute()) {
    ?>
    <script>
        alert('Salary rate has been updated!');
        window.location.href = 'home_salary.php';
    </script>
    <?php 
} else {
    echo "Something went wrong, Please try again!"; 
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>