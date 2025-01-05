<?php
session_start(); // Start a session for storing user data

// Database connection parameters
$host = 'localhost'; // Your database host
$db = 'login_system'; // Your database name
$user = 'root'; // Your database username
$pass = ''; // No password

// Create a connection to the database
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the posted username and password
$username = $_POST['username'];
$password = $_POST['password']; // Only assign this once

// Prepare a SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT password, user_type FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

// Check if the user exists
if ($stmt->num_rows > 0) {
    // Bind the result to variables
    $stmt->bind_result($stored_password, $user_type);
    $stmt->fetch();

    // Verify the password (this should ideally be hashed, but using plaintext here)
    if ($password === $stored_password) {
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $user_type;

        // Redirect based on user type
        if ($user_type === 'student') {
            header("Location: student.html"); // Redirect to the student page
        } elseif ($user_type === 'teacher') {
            header("Location: bms.php"); // Redirect to your existing form page
        }
        exit(); // Stop executing further code
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Username not found.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>
