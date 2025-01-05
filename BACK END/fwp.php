<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('/mnt/data/web.png') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header {
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .header h2 {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: lighter;
        }

        .form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }

        .form input {
            padding: 10px;
            font-size: 16px;
            border: 2px solid white;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
        }

        .form label {
            color: white;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .enter-button {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            color: black;
            font-size: 18px;
            font-weight: bold;
            padding: 15px 30px;
            border-radius: 25px;
            cursor: pointer;
            margin-top: 30px;
            text-transform: uppercase;
        }

        .enter-button:hover {
            background-color: #f0f0f0;
        }

        .arrow {
            margin-left: 10px;
            font-weight: bold;
            transform: translateY(2px);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Bethlahem Institute of Engineering</h1>
            <h2>Student Information Form</h2>
        </div>

        <form class="form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" id="department" name="department" required>
            </div>
            <div class="form-group">
                <label for="roll">Roll No</label>
                <input type="text" id="roll" name="roll" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="email">Gmail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="blood">Blood Group</label>
                <input type="text" id="blood" name="blood" required>
            </div>
        </form>

        <div class="enter-button">
            ENTER THE DETAILS <span class="arrow">→</span>
        </div>
    </div>

</body>
</html>
