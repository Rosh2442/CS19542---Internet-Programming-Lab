<?php
include 'db.php'; // Include the database connection

// Fetch employee details
$result = $conn->query("SELECT * FROM EMPDETAILS");

echo "<h2>Employee Details</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Date of Joining</th>
                <th>Salary</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['EMPID']}</td>
                <td>{$row['ENAME']}</td>
                <td>{$row['DESIG']}</td>
                <td>{$row['DEPT']}</td>
                <td>{$row['DOJ']}</td>
                <td>{$row['SALARY']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No employee records found.";
}

$conn->close();
?>
