<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your DB username
$password = ""; // Update with your DB password
$dbname = "airline_booking"; // Update with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Insert data into the users table
$sql = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?,?,?,?)");
$sql->bind_param("issssi", $name, $email, $password, $phone);

if ($conn->query($sql) === TRUE) {
    echo "Account created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
