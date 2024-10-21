<?php
session_start();
include 'register.php'; // Include the database connection file

// Check if the form was submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate that email and password fields are set
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare and bind statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        
        if (!$stmt) {
            // Check if the prepared statement was successful
            die('Error with statement preparation: ' . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password (assuming it's hashed in the database)
            if (password_verify($password, $user['password'])) {
                // Regenerate session ID to prevent session fixation attacks
                session_regenerate_id(true);
                
                // Store the user's info in session
                $_SESSION['user'] = $user['name']; // Store user's name
                $_SESSION['user_id'] = $user['id']; // Store user's ID

                // Redirect to the dashboard
                header("Location: dashboard.php");
                exit();
            } else {
                // Invalid password
                echo "<script>alert('Invalid password. Please try again.'); window.location.href='login.html';</script>";
            }
        } else {
            // No user found with the provided email
            echo "<script>alert('No account found with this email. Please create an account first.'); window.location.href='login.html';</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>alert('Please fill in both email and password fields.'); window.location.href='login.html';</script>";
    }
}

// Close the database connection
$conn->close();
?>
