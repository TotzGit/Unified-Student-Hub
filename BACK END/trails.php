<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('slide2.jpg'); /* Make sure to update the paths to your images */
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif; /* Ensure the Poppins font is applied */
            display: flex; 
            justify-content: center; 
            align-items: center;
            min-height: 100vh; /* Full screen height */
            flex-direction: column; /* Stack containers vertically */
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
            opacity: 0.4; /* Adjust background image opacity */
            z-index: -1; /* Keep the overlay behind the content */
        }
        
        .main-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            width: 80%;
            max-width: 1200px;
            margin-bottom: 20px;
        }

        .container {
            width: 45%;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            font-weight: bold;
			color:#fff;
        }
        
        .sub-container {
			color:#fff;
		}
        
        label {
            font-size: 16px;
            color: #fffS;
            margin-bottom: 5px;
            display: block;
        }
        
		input[type="text"]{
            width: 90%; /* Reduced width for better spacing */
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        select {
            width: 500px; /* Reduced width for better spacing */
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #6a11cb; /* Focus border color */
            outline: none;
        }

        button {
            width: 95%;
			margin-top:25px;
            background-color: #6a11cb;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: #2575fc;
        }

        /* Styles for disclaimer box */
        .disclaimer {
            width: 40%;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-size: 15px;
            color: #fff;
            text-align: center;
            margin-top: 20px;
        }

        .disclaimer strong {
            font-weight: bold;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="sub-container">
       <h1> Update The Details<h3>
        </div>
    <div class="main-container">
        <!-- Left Container -->
        <div class="container">
            <form action="process_update.php" method="POST">
                <label for="student">Enter Student Name:</label>
                <input type="text" id="student" name="student" required>
                
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
            </form>
        </div>
        
        <!-- Right Container -->
        <div class="container">
		<label for="studying_year">Studying Year:</label>
            <select id="studying_year" name="studying_year" required>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
            </select>
            
            <label for="field">Select Field to Update:</label>
            <select id="field" name="field" required>
                <option value="gmail">Gmail</option>
                <option value="phone">Phone</option>
                <option value="attendance">Attendance</option>
                <option value="attendance_mark">Attendance Mark</option>
                <option value="address">Address</option>
                <option value="blood_group">Blood Group</option>
            </select>
            <label for="new_value">Enter New Value:</label>
            <input type="text" id="new_value" name="new_value" required>
			
            <button type="submit">Update</button>
        </div>
    </div>
    
    <!-- Disclaimer Box -->
    <div class="disclaimer">
        <strong>Disclaimer</strong><br>
        <p>Enter the correct and appropriate details.</p>
            <p>Make sure the Worksheet is closed While Updating.</p>
            <p>After entering the details, click the submit button.</p>
    </div>
</body>
</html>
