<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $atype = trim($_POST['atype']);
    $balance = trim($_POST['balance']);
    $cid = trim($_POST['cid']);

    // Validate input
    if (($atype == 'S' || $atype == 'C') && is_numeric($balance) && $balance >= 0 && is_numeric($cid)) {
        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO ACCOUNT (ATYPE, BALANCE, CID) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $atype, $balance, $cid); // s = string, d = double, i = integer

        if ($stmt->execute()) {
            echo "Account added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please enter valid account details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Account</title>
</head>
<body>
    <h2>Add Account</h2>
    <form method="post" action="">
        Account Type: 
        <select name="atype" required>
            <option value="S">Savings</option>
            <option value="C">Current</option>
        </select><br>
        Balance: <input type="number" name="balance" required><br>
        Customer ID: <input type="number" name="cid" required><br>
        <input type="submit" value="Add Account">
    </form>
</body>
</html>
