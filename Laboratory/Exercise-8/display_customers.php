<?php
include 'db.php'; // Include your database connection file

// Query to select all customers
$sql = "SELECT * FROM CUSTOMER";
$result = $conn->query($sql);

// Check if there are any customers
if ($result->num_rows > 0) {
    echo "<h2>Customers</h2>";
    // Fetch and display each customer
    while ($customer = $result->fetch_assoc()) {
        echo "ID: " . $customer['CID'] . " - Name: " . $customer['CNAME'] . "<br>";
    }
} else {
    echo "No customers found.";
}

// Close the connection
$conn->close();
?>
