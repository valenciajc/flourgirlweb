<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // retrieve form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirm-password"];

  // connect to MySQL database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "users";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // insert form data into table
  $sql = "INSERT INTO users (name, email, password, confirm_password) VALUES ('$name', '$email', '$password', '$confirmPassword')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>