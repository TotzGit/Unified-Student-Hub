
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Body background with overlay */
        body {
            background-image: url('fotor-ai-20240814235257.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center 1px;
            font-family: Arial, sans-serif;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            opacity: 0.5;
            z-index: -1;
        }

        /* Form styling */
        .academic-header {
            text-align: left;
            font-size: 25px;
            padding-bottom: 15px;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        h1 {
            color: white;
            font-size: 36px;
            text-align: center;
        }

        input[type="text"], input[type="number"], input[type="email"] {
            border-radius: 8px;
            padding: 10px;
            border: 4px solid black;
            color: white;
            background-color: transparent;
        }

        #disclaimer-table {
            margin-top: 20px;
            margin-left: 70px;
            margin-right: -60px;
            text-align: right;
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        input[type="number"]#attendance {
            margin-right: 350px;
        }

        .white-label {
            font-size: 20px;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .table-spacing {
            margin-bottom: 30px;
        }

        .submit-container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: -100px;
        }

        .submit-button {
            margin-right: -300px;
            font-size: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .submit-button:hover {
            background-color: #45a049;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .submit-button:active {
            transform: scale(1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                background-color: #4CAF50;
            }
            50% {
                transform: scale(1.1);
                background-color: #45a049;
            }
            100% {
                transform: scale(1);
                background-color: #4CAF50;
            }
        }

        .tables-container {
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }

        .table-container {
            width: 48%;
        }

        .right-align {
            text-align: right;
        }

        .attendance-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            width: 100%;
            margin-bottom: 30px;
            margin-top: -300px;
        }

        /* Responsive for tablets and small screens */
        @media (max-width: 768px) {
            .form-group {
                flex: 1 1 100%;
            }
        }

        /* Responsive for mobile screens */
        @media (max-width: 480px) {
            body {
                padding: 5px;
            }

            input, textarea {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <form action="submit_form.php" method="POST">
        <h1>Student Information Form</h1>

        <div class="form-row">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="gmail">Gmail:</label>
            <input type="email" id="gmail" name="gmail" required>
        </div>

        <div class="form-row">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="rollno">Roll No:</label>
            <input type="text" id="rollno" name="rollno" required>
        </div>

        <div class="form-row">
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>

            <label for="year">Year:</label>
            <input type="text" id="year" name="year" required>
        </div>

        <h2>Technical Events</h2>
        <div class="form-row event-section">
            <input type="text" name="tech_event1" placeholder="Event 1">
            <input type="text" name="tech_mark1" placeholder="Mark 1">

            <input type="text" name="tech_event2" placeholder="Event 2">
            <input type="text" name="tech_mark2" placeholder="Mark 2">
        </div>

        <h2>Cultural Events</h2>
        <div class="form-row event-section">
            <input type="text" name="cult_event1" placeholder="Event 1">
            <input type="text" name="cult_mark1" placeholder="Mark 1">

            <input type="text" name="cult_event2" placeholder="Event 2">
            <input type="text" name="cult_mark2" placeholder="Mark 2">
        </div>

        <div class="form-row event-section">
            <input type="text" name="cult_event3" placeholder="Event 3">
            <input type="text" name="cult_mark3" placeholder="Mark 3">
        </div>

        <div class="submit-container">
            <button type="submit" class="submit-button">Submit</button>
        </div>
    </form>
</body>
</html>
