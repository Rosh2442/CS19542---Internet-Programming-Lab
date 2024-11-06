<?php
include 'db.php'; // Include your database connection file

// Query to select all accounts
$sql = "SELECT * FROM ACCOUNT";
$result = $conn->query($sql);

// Check if there are any accounts
if ($result->num_rows > 0) {
    echo "<h2>Accounts</h2>";
    // Fetch and display each account
    while ($account = $result->fetch_assoc()) {
        echo "Account No: " . $account['ANO'] . " - Type: " . $account['ATYPE'] . " - Balance: " . $account['BALANCE'] . "<br>";
    }
} else {
    echo "No accounts found.";
}

// Close the connection
$conn->close();
?>
