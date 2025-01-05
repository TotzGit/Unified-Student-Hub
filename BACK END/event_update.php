<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('slide2.jpg'); /* Make sure to update the paths to your images */
            background-position: center center; 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Allow the content to grow */
            margin: 0;
            overflow: auto;
        }
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            opacity: 0.4;
            z-index: -1;
        }
        .container {
            width: 150%;
            max-width: 800px;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            text-align: left;
            margin-top: 50px;
			margin-bottom: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
        }
        label {
            margin-top: 20px;
            font-weight: bold;
        }
        input, select {
    width: 100%; /* Make input and select fields responsive */
    padding: 10px; /* Add padding for better appearance */
    margin-top: 10px; /* Space above each element */
    margin-bottom: 20px; /* Space below each element */
    border: 1px solid #ccc; /* Border style */
    border-radius: 5px; /* Rounded corners */
    box-sizing: border-box; /* Ensure padding is included in width */
}
        button {
            display: block;
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
			font-family: 'Poppins', sans-serif;
			font-weight: bold;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
		.container h1 {
    margin-top: -10px; /* Adjust the value as needed */
}
.container h4 {
    color: white;
	font-size: 30px;
}
form {
    background: background-color: rgba(0, 0, 0, 0.5);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
    color: white; /* Ensure text is readable on the gradient */
}
    </style>
</head>
<body>

<div class="container">
    <h1>Update Event Details</h1>
    <form action="process_event_update.php" method="POST">
        <label for="student_name">Enter Student Name:</label>
        <input type="text" id="student_name" name="student_name" required>

        <label for="department">Enter Department:</label>
        <input type="text" id="department" name="department" required>

        <label for="roll_no">Enter Roll Number:</label>
        <input type="text" id="roll_no" name="roll_no" required>
		
		<label for="year">Enter Year:</label>
                <select id="year" name="year" required>
                    <!-- Manually list years 2008 to 2030 -->
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
		
		<label for="studying_year">Studying Year:</label>
            <select id="studying_year" name="studying_year" required>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
            </select>

        <h4>Technical Events</h4>
        <?php for ($i = 1; $i <= 6; $i++): ?>
            <label>Event <?= $i ?>:</label>
            <input type="text" name="tech_event_<?= $i ?>" placeholder="Leave blank to keep current value">
            <label>Marks:</label>
            <input type="number" name="tech_marks_<?= $i ?>" placeholder="Leave blank to keep current value">
        <?php endfor; ?>

        <h4>Cultural Events</h4>
        <?php for ($i = 1; $i <= 6; $i++): ?>
            <label>Event <?= $i ?>:</label>
            <input type="text" name="cult_event_<?= $i ?>" placeholder="Leave blank to keep current value">
            <label>Marks:</label>
            <input type="number" name="cult_marks_<?= $i ?>" placeholder="Leave blank to keep current value">
        <?php endfor; ?>

        <h4>Academic Events</h4>
        <?php for ($i = 1; $i <= 6; $i++): ?>
            <label>Event <?= $i ?>:</label>
            <input type="text" name="acad_event_<?= $i ?>" placeholder="Leave blank to keep current value">
            <label>Marks:</label>
            <input type="number" name="acad_marks_<?= $i ?>" placeholder="Leave blank to keep current value">
        <?php endfor; ?>

        <h4>Sports/Social Events</h4>
        <?php for ($i = 1; $i <= 6; $i++): ?>
            <label>Event <?= $i ?>:</label>
            <input type="text" name="sports_event_<?= $i ?>" placeholder="Leave blank to keep current value">
            <label>Marks:</label>
            <input type="number" name="sports_marks_<?= $i ?>" placeholder="Leave blank to keep current value">
        <?php endfor; ?>

        <h4>Online Courses</h4>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <label>Course <?= $i ?>:</label>
            <input type="text" name="online_course_<?= $i ?>" placeholder="Leave blank to keep current value">
			<label>Marks:</label>
            <input type="number" name="online_course_marks<?= $i ?>" placeholder="Leave blank to keep current value">
        <?php endfor; ?>

        <button type="submit">Update Events</button>
    </form>
</div>

</body>
</html>
