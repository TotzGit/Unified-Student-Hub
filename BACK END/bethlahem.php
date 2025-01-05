<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .header {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
            color: white;
        }
        .nav {
            display: flex;
            justify-content: center;
            background-color: #333;
        }
        .nav a {
            display: block;
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        .nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            margin: 20px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .content {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Welcome to the Student Management System</h1>
    </div>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="nixon.php">Student Portal</a>
        <a href="update.php">Update Details</a>
        <a href="process_event_update.php">Update Event Details</a>
    </div>

    <div class="container">
        <div class="content">
            <h2>Home</h2>
            <p>Welcome to the student management system. Use the navigation menu to access the various sections like the student portal, update student details, and update event details.</p>
        </div>
    </div>

</body>
</html>
