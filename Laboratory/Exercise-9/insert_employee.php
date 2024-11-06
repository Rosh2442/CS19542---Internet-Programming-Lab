<?php
include 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ename = trim($_POST['ename']);
    $desig = trim($_POST['desig']);
    $dept = trim($_POST['dept']);
    $doj = trim($_POST['doj']);
    $salary = trim($_POST['salary']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO EMPDETAILS (ENAME, DESIG, DEPT, DOJ, SALARY) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $ename, $desig, $dept, $doj, $salary);

    if ($stmt->execute()) {
        echo "<div>Employee added successfully!</div>";
    } else {
        echo "<div>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
</head>
<body>
    <h2>Add Employee</h2>
    <form method="post">
        <label for="ename">Employee Name:</label>
        <input type="text" name="ename" required><br>
        <label for="desig">Designation:</label>
        <input type="text" name="desig"><br>
        <label for="dept">Department:</label>
        <input type="text" name="dept"><br>
        <label for="doj">Date of Joining:</label>
        <input type="date" name="doj"><br>
        <label for="salary">Salary:</label>
        <input type="number" step="0.01" name="salary"><br>
        <input type="submit" value="Add Employee">
    </form>
</body>
</html>
