<?php
  include("db.php");
  if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  }

  $result = $conn->query("SELECT * FROM employee");
  $rows = $result->num_rows;
  echo $rows;
?>