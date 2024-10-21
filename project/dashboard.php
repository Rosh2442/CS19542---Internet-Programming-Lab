<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // If user is not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Airline Reservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .container {
            margin-top: 50px;
        }
        .btn-primary {
            background-color: navy;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center">Welcome to Your Dashboard</h2>
        <p class="text-center">Logged in as: <?php echo $_SESSION['user']; ?></p> <!-- Display the logged-in user -->

        <div class="text-center">
            <a href="book_ticket.html" class="btn btn-primary">Book Tickets</a>
            <a href="flight_info.html" class="btn btn-primary">Check Flight Information</a>
            <a href="price_difference.html" class="btn btn-primary">Check Price Differences</a>
        </div>
    </div>

</body>
</html>
