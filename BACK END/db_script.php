<?php
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

// Step 2: Insert users with normal passwords
$sql_insert_users = "INSERT INTO users (username, password, user_type) VALUES 
('aravind', 'aravind2005', 'student'),
('jency', 'jency1980', 'teacher')
ON DUPLICATE KEY UPDATE username=username;"; // This prevents duplicate entries for existing usernames

if ($conn->query($sql_insert_users) === TRUE) {
    echo "Users inserted successfully.<br>";
} else {
    echo "Error inserting users: " . $conn->error . "<br>";
}

// Step 3: Verification - Retrieve and display all users
$sql_select_users = "SELECT * FROM users;";
$result = $conn->query($sql_select_users);

if ($result->num_rows > 0) {
    echo "<h3>Current users in the database:</h3>";
    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Password</th><th>User Type</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['password']) . "</td><td>" . htmlspecialchars($row['user_type']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No users found.<br>";
}

// Close the database connection
$conn->close();
?>
