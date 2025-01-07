<?php
  // Create a connection
  $conn = mysqli_connect('localhost', 'root', '', 'payroll_s');

  // Check connection
  if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
  }

  if (isset($_POST['submit'])) {
    $lname    = mysqli_real_escape_string($conn, $_POST['lname']);
    $fname    = mysqli_real_escape_string($conn, $_POST['fname']);
    $gender   = mysqli_real_escape_string($conn, $_POST['gender']);
    $type     = mysqli_real_escape_string($conn, $_POST['emp_type']);
    $division = mysqli_real_escape_string($conn, $_POST['division']);
    $contact  = mysqli_real_escape_string($conn, $_POST['contact']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO employee (lname, fname, gender, emp_type, division, contact, address, email) 
            VALUES ('$lname', '$fname', '$gender', '$type', '$division', '$contact', '$address', '$email')";

    if (mysqli_query($conn, $sql)) {
      ?>
        <script>
            alert('Employee has been added!');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    } else {
      ?>
        <script>
            alert('An Error Occurred: <?php echo mysqli_error($conn); ?>');
            window.location.href='index.php';
        </script>
      <?php 
    }
  }

  // Close the connection
  mysqli_close($conn);
?>