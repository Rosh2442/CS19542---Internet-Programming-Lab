<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cname = trim($_POST['cname']);

    // Validate input
    if (!empty($cname)) {
        // Prepare and execute the statement
        $stmt = $conn->prepare("INSERT INTO CUSTOMER (CNAME) VALUES (?)");
        $stmt->bind_param("s", $cname);

        if ($stmt->execute()) {
            echo "Customer added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please enter a valid name.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Customer</title>
</head>
<body>
    <h2>Add Customer</h2>
    <form method="post" action="">
        Customer Name: <input type="text" name="cname" required>
        <input type="submit" value="Add Customer">
    </form>
</body>
</html>
