<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $date = $_POST['date'];
    $passengers = $_POST['passengers'];
    $class = $_POST['class'];
    $ticket_number = "AIR" . rand(10000, 99999);

    echo "<h1>Ticket Confirmation</h1>";
    echo "<p><strong>Ticket Number:</strong> " . $ticket_number . "</p>";
    echo "<p><strong>From:</strong> " . $from . "</p>";
    echo "<p><strong>To:</strong> " . $to . "</p>";
    echo "<p><strong>Date:</strong> " . $date . "</p>";
    echo "<p><strong>Passengers:</strong> " . $passengers . "</p>";
    echo "<p><strong>Class:</strong> " . $class . "</p>";
    echo "<p>Thank you for booking with us! Have a safe journey!</p>";
}
?>
