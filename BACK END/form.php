<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Student Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('slide2.jpg'); /* Make sure to update the paths to your images */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position:Center Center;
            color: #fff;
            padding: 20px;
        }

body {
    position: relative;
    font-family: Arial, sans-serif;
    }

    body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color:rgba(0,0,0,0.5); 
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center center;
    opacity: 0.5; /* Adjust background image opacity */
    z-index: -1; /* Keep the overlay behind the content */
    }


        form {
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-section {
            margin-bottom: 30px;
			font-family:"poppins";

        }

        .form-section h2 {
            font-size: 25px;
            margin-bottom: 15px;
            border-bottom: 2px solid white;
            padding-bottom: 5px;
        }

        .form-group {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 15px;
    align-items: center;
}

.form-group label {
    flex: 1 1 200px; /* Label width remains the same */
    font-size: 20px;
    margin-right: 10px;
}

.form-group input {
    flex: 2 1 300px; /* Standard width for other input fields */
    padding: 8px;
    font-size: 16px;
    border: 1px solid #555;
    border-radius: 4px;
    background-color: #fff;
    color: black;
}

.form-group select { /* Apply styles to all select elements */
    flex: 2 1 320px; /* Default width for select fields */
    padding: 8px;
    font-size: 16px;
    border: 1px solid #555;
    border-radius: 4px;
    background-color: #fff;
    color: black;
    appearance: none; /* Remove default arrow */
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABFElEQVR42mJ8//8/A8FQwoaUQ/AzU0bE1tP3w2G0ZjD7IbxkBlaMH2gDg7uOyc5BeQAAAABJRU5ErkJggg=='); /* Custom arrow */
    background-repeat: no-repeat;
    background-position: right 10px center; /* Position of custom arrow */
    background-size: 15px; /* Size of custom arrow */
}

/* Increase the width of the Year dropdown specifically */
.form-group select#year {
    flex: 2 1 315px; /* Increased width from 300px to 400px for the Year dropdown */
}

/* Optional: To change the appearance of the dropdown when focused */
.form-group select:focus,
.form-group input:focus {
    border-color: #888; /* Change border color on focus */
    outline: none; /* Remove outline */
}



        .events-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .events-category {
            flex: 1 1 45%;
            background-color: #444;
            padding: 15px;
            border-radius: 8px;
			margin-bottom:15px;
			
        }

        .events-category h3 {
            font-size: 22px;
            margin-bottom: 10px;
            border-bottom: 1px solid #555;
            padding-bottom: 5px;
        }

        .event-group {
            margin-bottom: 10px;
            display: flex;
            flex-wrap: wrap;
            align-items:left;
			
        }

        .event-group label {
            font-size: 18px;
            margin-right: 5px;
            flex: 1 1 100px;
			
        }

        .event-group input {
            flex: 2 1 150px;
            margin-right: 315px;
			border-radius:5px;
        }

        .online-courses {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .online-course-group {
            flex: 1 1 45%;
            background-color:rgba(0,0,0,0.5);
            padding: 15px;
            border-radius: 8px;
        }

        .online-course-group h3 {
            font-size: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #555;
            padding-bottom: 5px;
        }

        .online-course-item {
            margin-bottom: 10px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .online-course-item label {
            font-size: 18px;
            margin-right: 5px;
            flex: 1 1 120px;
        }

        .online-course-item input {
            flex: 2 1 150px;
            margin-right: 15px;
			border-radius:5px;
			height: 30px;
        }

        .attendance-container {
            margin-bottom: 30px;
            background-color:rgba(0,0,0,0.5);
            padding: 15px;
            border-radius: 8px;
        }

        .attendance-container h2 {
            font-size: 25px;
            margin-bottom: 15px;
            border-bottom: 2px solid #555;
            padding-bottom: 5px;
        }

        .attendance-group {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 15px;
        }

        .attendance-group label {
            font-size: 20px;
            margin-right: 10px;
            flex: 1 1 200px;
        }

        .attendance-group input {
            flex: 2 1 300px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #555;
            border-radius: 4px;
            background-color: white;
            color: black;
        }
		
		.container {
            padding: 20px;
        }
        .event-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .event-row label {
            width: 100px;
        }
        .event-input {
            flex: 1;
            margin-right: 20px;
        }
        .mark-input {
            width: 80px;
        }

        .submit-container {
            text-align: center;
            margin-top: 30px;
			
        }

       .submit-button {
	font-weight: bold;
    padding: 10px 20px;
    font-size: 18px;
    background-color: #28a745;
    border: none;
    border-radius: 6px;
    color: #fff;
    cursor: pointer;
    position: relative;
    overflow: hidden; /* Ensures the effect stays within the button */
}

.submit-button::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%; /* Start off-screen */
    width: 200%; /* Ensure it covers the button */
    height: 100%;
    background: linear-gradient(120deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.2));
    transition: 0.4s ease-in-out;
    z-index: 1;
    transform: rotate(-20deg);
}

.submit-button:hover::before {
    left: 100%; /* Moves the effect across the button */
    transition: 0.4s ease-in-out;
}

.submit-button:hover {
    background-color: #218838;
}

.submit-button:focus {
    outline: none;
}

/* Add this to prevent text from being hidden by the mask effect */
.submit-button span {
    position: relative;
    z-index: 2;
}


        .disclaimer {
            background-color:rgba(0,0,0,0.5);
            padding: 10px;
            border-radius: 6px;
            margin-top: 20px;
        }

        .disclaimer p {
            margin: 5px 0;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .form-group, .event-group, .online-course-item, .attendance-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-group label, .form-group input,
            .event-group label, .event-group input,
            .online-course-item label, .online-course-item input,
            .attendance-group label, .attendance-group input {
                flex: 1 1 100%;
                margin-right: 0;
            }

            .events-container, .online-courses {
                flex-direction: column;
            }

            .events-category, .online-course-group {
                flex: 1 1 100%;
            }
			
		.events-A {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .events-A-group {
            flex: 1 1 45%;
            background-color: #444;
            padding: 15px;
            border-radius: 8px;
        }

        .events-A-group h3 {
            font-size: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #555;
            padding-bottom: 5px;
        }

        .events-A-item {
            margin-bottom: 10px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .events-A-item label {
            font-size: 18px;
            margin-right: 5px;
            flex: 1 1 120px;
        }

        .events-A-item input {
            flex: 2 1 150px;
            margin-right: 15px;
			border-radius:5px;
        }
        }
		
		.technical-events {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

/* Event Group Styles */
.tech-event-group1, .tech-event-group2, .tech-event-group3,
.tech-event-group4, .tech-event-group5, .tech-event-group6 {
    flex: 1 1 45%;
    background-color:rgba(0,0,0,0.5);
    padding: 15px;
    border-radius: 8px;
}

/* Event Heading Styles */
.tech-event-group1 h3, .tech-event-group2 h3, .tech-event-group3 h3,
.tech-event-group4 h3, .tech-event-group5 h3, .tech-event-group6 h3 {
    font-size: 20px;
    margin-bottom: 10px;
    border-bottom: 1px solid #555;
    padding-bottom: 5px;
}

/* Event Item Styles */
.tech-event-item1, .tech-event-item2, .tech-event-item3,
.tech-event-item4, .tech-event-item5, .tech-event-item6 {
    margin-bottom: 10px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

/* Label Styles */
.tech-event-item1 label, .tech-event-item2 label, .tech-event-item3 label,
.tech-event-item4 label, .tech-event-item5 label, .tech-event-item6 label {
    font-size: 18px;
    margin-right: 5px;
    flex: 1 1 120px;
}

/* Input Styles */
.tech-event-item1 input, .tech-event-item2 input, .tech-event-item3 input,
.tech-event-item4 input, .tech-event-item5 input, .tech-event-item6 input {
    flex: 2 1 150px;
    margin-right: 15px;
    border-radius: 5px;
	height: 30px;
}

.cultural-events {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

/* Event Group Styles */
.cultural-event-group1, .cultural-event-group2, .cultural-event-group3,
.cultural-event-group4, .cultural-event-group5, .cultural-event-group6 {
    flex: 1 1 45%;
    background-color:rgba(0,0,0,0.5);
    padding: 15px;
    border-radius: 8px;
}

/* Event Heading Styles */
.cultural-event-group1 h3, .cultural-event-group2 h3, .cultural-event-group3 h3,
.cultural-event-group4 h3, .cultural-event-group5 h3, .cultural-event-group6 h3 {
    font-size: 20px;
    margin-bottom: 10px;
    border-bottom: 1px solid #555;
    padding-bottom: 5px;
}

/* Event Item Styles */
.cultural-event-item1, .cultural-event-item2, .cultural-event-item3,
.cultural-event-item4, .cultural-event-item5, .cultural-event-item6 {
    margin-bottom: 10px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

/* Label Styles */
.cultural-event-item1 label, .cultural-event-item2 label, .cultural-event-item3 label,
.cultural-event-item4 label, .cultural-event-item5 label, .cultural-event-item6 label {
    font-size: 18px;
    margin-right: 5px;
    flex: 1 1 120px;
}

/* Input Styles */
.cultural-event-item1 input, .cultural-event-item2 input, .cultural-event-item3 input,
.cultural-event-item4 input, .cultural-event-item5 input, .cultural-event-item6 input {
    flex: 2 1 150px;
    margin-right: 15px;
    border-radius: 5px;
    height: 30px;	
}

.sports-events {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

/* Event Group Styles */
.sports-event-group1, .sports-event-group2, .sports-event-group3,
.sports-event-group4, .sports-event-group5, .sports-event-group6 {
    flex: 1 1 45%;
    background-color:rgba(0,0,0,0.5);
    padding: 15px;
    border-radius: 8px;
}

/* Event Heading Styles */
.sports-event-group1 h3, .sports-event-group2 h3, .sports-event-group3 h3,
.sports-event-group4 h3, .sports-event-group5 h3, .sports-event-group6 h3 {
    font-size: 20px;
    margin-bottom: 10px;
    border-bottom: 1px solid #555;
    padding-bottom: 5px;
}

/* Event Item Styles */
.sports-event-item1, .sports-event-item2, .sports-event-item3,
.sports-event-item4, .sports-event-item5, .sports-event-item6 {
    margin-bottom: 10px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

/* Label Styles */
.sports-event-item1 label, .sports-event-item2 label, .sports-event-item3 label,
.sports-event-item4 label, .sports-event-item5 label, .sports-event-item6 label {
    font-size: 18px;
    margin-right: 5px;
    flex: 1 1 120px;
}

/* Input Styles */
.sports-event-item1 input, .sports-event-item2 input, .sports-event-item3 input,
.sports-event-item4 input, .sports-event-item5 input, .sports-event-item6 input {
    flex: 2 1 150px;
    margin-right: 15px;
    border-radius: 5px;
	height: 30px;
}

.academic-events {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

/* Event Group Styles */
.academic-event-group1, .academic-event-group2, .academic-event-group3,
.academic-event-group4, .academic-event-group5, .academic-event-group6 {
    flex: 1 1 45%;
    background-color:rgba(0,0,0,0.5);
    padding: 15px;
    border-radius: 8px;
}

/* Event Heading Styles */
.academic-event-group1 h3, .academic-event-group2 h3, .academic-event-group3 h3,
.academic-event-group4 h3, .academic-event-group5 h3, .academic-event-group6 h3 {
    font-size: 20px;
    margin-bottom: 10px;
    border-bottom: 1px solid #555;
    padding-bottom: 5px;
}

/* Event Item Styles */
.academic-event-item1, .academic-event-item2, .academic-event-item3,
.academic-event-item4, .academic-event-item5, .academic-event-item6 {
    margin-bottom: 10px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

/* Label Styles */
.academic-event-item1 label, .academic-event-item2 label, .academic-event-item3 label,
.academic-event-item4 label, .academic-event-item5 label, .academic-event-item6 label {
    font-size: 18px;
    margin-right: 5px;
    flex: 1 1 120px;
}

/* Input Styles */
.academic-event-item1 input, .academic-event-item2 input, .academic-event-item3 input,
.academic-event-item4 input, .academic-event-item5 input, .academic-event-item6 input {
    flex: 2 1 150px;
    margin-right: 15px;
    border-radius: 5px;
	height: 30px;
}

		
    </style>
</head>
<body>

    <form action="process.php" method="post">
        <!-- Student Information Section -->
        <div class="form-section">
            <h2>Student Information</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="gmail">Gmail:</label>
                <input type="email" id="gmail" name="gmail" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" id="department" name="department" required>
            </div>
            <div class="form-group">
    <label for="year">Year:</label>
    <select id="year" name="year" required>
        <option value="" disabled selected>Select Year</option>
        <!-- Options will be populated by JavaScript -->
    </select>
</div>

<script>
    const yearSelect = document.getElementById('year');
    const startYear = 2008; // Starting year
    const endYear = 2030; // Ending year

    for (let year = startYear; year <= endYear; year++) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        yearSelect.appendChild(option);
    }
</script>

            <div class="form-group">
                <label for="roll_no">Roll No:</label>
                <input type="text" id="roll_no" name="roll_no" required>
            </div>
            <div class="form-group">
                <label for="blood_group">Blood Group:</label>
                <input type="text" id="blood_group" name="blood_group" required>
            </div>
			
			<div class="form-group">
                <label for="studying_year">Studying Year:</label>
            <select id="studying_year" name="studying_year" required>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
            </select>
            </div>
			
        </div>

        <!-- Events Section -->
		<div class="form-section">
    <h2>Academic Events</h2>
    <div class="academic-events">
        <!-- Academic Event 1 -->
        <div class="academic-event-group1">
            <h3>Academic Event 1</h3>
            <div class="academic-event-item1">
                <label for="academic_event1">Event Name:</label>
                <input type="text" id="academic_event1" name="academic_event1">
            </div>
            <div class="academic-event-item1">
                <label for="academic_mark1">Mark:</label>
                <input type="number" id="academic_mark1" name="academic_mark1" min="0" max="100">
            </div>
        </div>
        <!-- Academic Event 2 -->
        <div class="academic-event-group2">
            <h3>Academic Event 2</h3>
            <div class="academic-event-item2">
                <label for="academic_event2">Event Name:</label>
                <input type="text" id="academic_event2" name="academic_event2">
            </div>
            <div class="academic-event-item2">
                <label for="academic_mark2">Mark:</label>
                <input type="number" id="academic_mark2" name="academic_mark2" min="0" max="100">
            </div>
        </div>
        <!-- Academic Event 3 -->
        <div class="academic-event-group3">
            <h3>Academic Event 3</h3>
            <div class="academic-event-item3">
                <label for="academic_event3">Event Name:</label>
                <input type="text" id="academic_event3" name="academic_event3">
            </div>
            <div class="academic-event-item3">
                <label for="academic_mark3">Mark:</label>
                <input type="number" id="academic_mark3" name="academic_mark3" min="0" max="100">
            </div>
        </div>
        <!-- Academic Event 4 -->
        <div class="academic-event-group4">
            <h3>Academic Event 4</h3>
            <div class="academic-event-item4">
                <label for="academic_event4">Event Name:</label>
                <input type="text" id="academic_event4" name="academic_event4">
            </div>
            <div class="academic-event-item4">
                <label for="academic_mark4">Mark:</label>
                <input type="number" id="academic_mark4" name="academic_mark4" min="0" max="100">
            </div>
        </div>
        <!-- Academic Event 5 -->
        <div class="academic-event-group5">
            <h3>Academic Event 5</h3>
            <div class="academic-event-item5">
                <label for="academic_event5">Event Name:</label>
                <input type="text" id="academic_event5" name="academic_event5">
            </div>
            <div class="academic-event-item5">
                <label for="academic_mark5">Mark:</label>
                <input type="number" id="academic_mark5" name="academic_mark5" min="0" max="100">
            </div>
        </div>
        <!-- Academic Event 6 -->
        <div class="academic-event-group6">
            <h3>Academic Event 6</h3>
            <div class="academic-event-item6">
                <label for="academic_event6">Event Name:</label>
                <input type="text" id="academic_event6" name="academic_event6">
            </div>
            <div class="academic-event-item6">
                <label for="academic_mark6">Mark:</label>
                <input type="number" id="academic_mark6" name="academic_mark6" min="0" max="100">
            </div>
        </div>
    </div>
</div>

        <div class="form-section">
    <h2>Technical Events</h2>
    <div class="technical-events">
        <!-- Technical Event 1 -->
        <div class="tech-event-group1">
            <h3>Technical Event 1</h3>
            <div class="tech-event-item1">
                <label for="tech_event1">Event Name:</label>
                <input type="text" id="tech_event1" name="tech_event1">
            </div>
            <div class="tech-event-item1">
                <label for="tech_mark1">Mark:</label>
                <input type="number" id="tech_mark1" name="tech_mark1" min="0" max="100">
            </div>
        </div>
        <!-- Technical Event 2 -->
        <div class="tech-event-group2">
            <h3>Technical Event 2</h3>
            <div class="tech-event-item2">
                <label for="tech_event2">Event Name:</label>
                <input type="text" id="tech_event2" name="tech_event2">
            </div>
            <div class="tech-event-item2">
                <label for="tech_mark2">Mark:</label>
                <input type="number" id="tech_mark2" name="tech_mark2" min="0" max="100">
            </div>
        </div>
        <!-- Technical Event 3 -->
        <div class="tech-event-group3">
            <h3>Technical Event 3</h3>
            <div class="tech-event-item3">
                <label for="tech_event3">Event Name:</label>
                <input type="text" id="tech_event3" name="tech_event3">
            </div>
            <div class="tech-event-item3">
                <label for="tech_mark3">Mark:</label>
                <input type="number" id="tech_mark3" name="tech_mark3" min="0" max="100">
            </div>
        </div>
        <!-- Technical Event 4 -->
        <div class="tech-event-group4">
            <h3>Technical Event 4</h3>
            <div class="tech-event-item4">
                <label for="tech_event4">Event Name:</label>
                <input type="text" id="tech_event4" name="tech_event4">
            </div>
            <div class="tech-event-item4">
                <label for="tech_mark4">Mark:</label>
                <input type="number" id="tech_mark4" name="tech_mark4" min="0" max="100">
            </div>
        </div>
        <!-- Technical Event 5 -->
        <div class="tech-event-group5">
            <h3>Technical Event 5</h3>
            <div class="tech-event-item5">
                <label for="tech_event5">Event Name:</label>
                <input type="text" id="tech_event5" name="tech_event5">
            </div>
            <div class="tech-event-item5">
                <label for="tech_mark5">Mark:</label>
                <input type="number" id="tech_mark5" name="tech_mark5" min="0" max="100">
            </div>
        </div>
        <!-- Technical Event 6 -->
        <div class="tech-event-group6">
            <h3>Technical Event 6</h3>
            <div class="tech-event-item6">
                <label for="tech_event6">Event Name:</label>
                <input type="text" id="tech_event6" name="tech_event6">
            </div>
            <div class="tech-event-item6">
                <label for="tech_mark6">Mark:</label>
                <input type="number" id="tech_mark6" name="tech_mark6" min="0" max="100">
            </div>
        </div>
    </div>
</div>

<div class="form-section">
    <h2>Cultural Events</h2>
    <div class="cultural-events">
        <!-- Cultural Event 1 -->
        <div class="cultural-event-group1">
            <h3>Cultural Event 1</h3>
            <div class="cultural-event-item1">
                <label for="cultural_event1">Event Name:</label>
                <input type="text" id="cultural_event1" name="cultural_event1">
            </div>
            <div class="cultural-event-item1">
                <label for="cultural_mark1">Mark:</label>
                <input type="number" id="cultural_mark1" name="cultural_mark1" min="0" max="100">
            </div>
        </div>
        <!-- Cultural Event 2 -->
        <div class="cultural-event-group2">
            <h3>Cultural Event 2</h3>
            <div class="cultural-event-item2">
                <label for="cultural_event2">Event Name:</label>
                <input type="text" id="cultural_event2" name="cultural_event2">
            </div>
            <div class="cultural-event-item2">
                <label for="cultural_mark2">Mark:</label>
                <input type="number" id="cultural_mark2" name="cultural_mark2" min="0" max="100">
            </div>
        </div>
        <!-- Cultural Event 3 -->
        <div class="cultural-event-group3">
            <h3>Cultural Event 3</h3>
            <div class="cultural-event-item3">
                <label for="cultural_event3">Event Name:</label>
                <input type="text" id="cultural_event3" name="cultural_event3">
            </div>
            <div class="cultural-event-item3">
                <label for="cultural_mark3">Mark:</label>
                <input type="number" id="cultural_mark3" name="cultural_mark3" min="0" max="100">
            </div>
        </div>
        <!-- Cultural Event 4 -->
        <div class="cultural-event-group4">
            <h3>Cultural Event 4</h3>
            <div class="cultural-event-item4">
                <label for="cultural_event4">Event Name:</label>
                <input type="text" id="cultural_event4" name="cultural_event4">
            </div>
            <div class="cultural-event-item4">
                <label for="cultural_mark4">Mark:</label>
                <input type="number" id="cultural_mark4" name="cultural_mark4" min="0" max="100">
            </div>
        </div>
        <!-- Cultural Event 5 -->
        <div class="cultural-event-group5">
            <h3>Cultural Event 5</h3>
            <div class="cultural-event-item5">
                <label for="cultural_event5">Event Name:</label>
                <input type="text" id="cultural_event5" name="cultural_event5">
            </div>
            <div class="cultural-event-item5">
                <label for="cultural_mark5">Mark:</label>
                <input type="number" id="cultural_mark5" name="cultural_mark5" min="0" max="100">
            </div>
        </div>
        <!-- Cultural Event 6 -->
        <div class="cultural-event-group6">
            <h3>Cultural Event 6</h3>
            <div class="cultural-event-item6">
                <label for="cultural_event6">Event Name:</label>
                <input type="text" id="cultural_event6" name="cultural_event6">
            </div>
            <div class="cultural-event-item6">
                <label for="cultural_mark6">Mark:</label>
                <input type="number" id="cultural_mark6" name="cultural_mark6" min="0" max="100">
            </div>
        </div>
    </div>
</div>

<div class="form-section">
    <h2>Sports/Social Events</h2>
    <div class="sports-events">
        <!-- Sports Event 1 -->
        <div class="sports-event-group1">
            <h3>Sports Event 1</h3>
            <div class="sports-event-item1">
                <label for="sports_event1">Event Name:</label>
                <input type="text" id="sports_event1" name="sports_event1">
            </div>
            <div class="sports-event-item1">
                <label for="sports_mark1">Mark:</label>
                <input type="number" id="sports_mark1" name="sports_mark1" min="0" max="100">
            </div>
        </div>
        <!-- Sports Event 2 -->
        <div class="sports-event-group2">
            <h3>Sports Event 2</h3>
            <div class="sports-event-item2">
                <label for="sports_event2">Event Name:</label>
                <input type="text" id="sports_event2" name="sports_event2">
            </div>
            <div class="sports-event-item2">
                <label for="sports_mark2">Mark:</label>
                <input type="number" id="sports_mark2" name="sports_mark2" min="0" max="100">
            </div>
        </div>
        <!-- Sports Event 3 -->
        <div class="sports-event-group3">
            <h3>Sports Event 3</h3>
            <div class="sports-event-item3">
                <label for="sports_event3">Event Name:</label>
                <input type="text" id="sports_event3" name="sports_event3">
            </div>
            <div class="sports-event-item3">
                <label for="sports_mark3">Mark:</label>
                <input type="number" id="sports_mark3" name="sports_mark3" min="0" max="100">
            </div>
        </div>
        <!-- Sports Event 4 -->
        <div class="sports-event-group4">
            <h3>Sports Event 4</h3>
            <div class="sports-event-item4">
                <label for="sports_event4">Event Name:</label>
                <input type="text" id="sports_event4" name="sports_event4">
            </div>
            <div class="sports-event-item4">
                <label for="sports_mark4">Mark:</label>
                <input type="number" id="sports_mark4" name="sports_mark4" min="0" max="100">
            </div>
        </div>
        <!-- Sports Event 5 -->
        <div class="sports-event-group5">
            <h3>Sports Event 5</h3>
            <div class="sports-event-item5">
                <label for="sports_event5">Event Name:</label>
                <input type="text" id="sports_event5" name="sports_event5">
            </div>
            <div class="sports-event-item5">
                <label for="sports_mark5">Mark:</label>
                <input type="number" id="sports_mark5" name="sports_mark5" min="0" max="100">
            </div>
        </div>
        <!-- Sports Event 6 -->
        <div class="sports-event-group6">
            <h3>Sports Event 6</h3>
            <div class="sports-event-item6">
                <label for="sports_event6">Event Name:</label>
                <input type="text" id="sports_event6" name="sports_event6">
            </div>
            <div class="sports-event-item6">
                <label for="sports_mark6">Mark:</label>
                <input type="number" id="sports_mark6" name="sports_mark6" min="0" max="100">
            </div>
        </div>
    </div>
</div>


        <!-- Online Courses Section -->
        <div class="form-section">
            <h2>Online Courses</h2>
            <div class="online-courses">
                <!-- Online Course 1 -->
                <div class="online-course-group">
                    <h3>Online Course 1</h3>
                    <div class="online-course-item">
                        <label for="online_course1">Course Name:</label>
                        <input type="text" id="online_course1" name="online_course1">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark1">Mark:</label>
                        <input type="number" id="online_mark1" name="online_mark1" min="0" max="100">
                    </div>
                </div>
                <!-- Online Course 2 -->
                <div class="online-course-group">
                    <h3>Online Course 2</h3>
                    <div class="online-course-item">
                        <label for="online_course2">Course Name:</label>
                        <input type="text" id="online_course2" name="online_course2">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark2">Mark:</label>
                        <input type="number" id="online_mark2" name="online_mark2" min="0" max="100">
                    </div>
                </div>
                <!-- Online Course 3 -->
                <div class="online-course-group">
                    <h3>Online Course 3</h3>
                    <div class="online-course-item">
                        <label for="online_course3">Course Name:</label>
                        <input type="text" id="online_course3" name="online_course3">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark3">Mark:</label>
                        <input type="number" id="online_mark3" name="online_mark3" min="0" max="100">
                    </div>
                </div>
                <!-- Online Course 4 -->
                <div class="online-course-group">
                    <h3>Online Course 4</h3>
                    <div class="online-course-item">
                        <label for="online_course4">Course Name:</label>
                        <input type="text" id="online_course4" name="online_course4">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark4">Mark:</label>
                        <input type="number" id="online_mark4" name="online_mark4" min="0" max="100">
                    </div>
                </div>
                <!-- Online Course 5 -->
                <div class="online-course-group">
                    <h3>Online Course 5</h3>
                    <div class="online-course-item">
                        <label for="online_course5">Course Name:</label>
                        <input type="text" id="online_course5" name="online_course5">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark5">Mark:</label>
                        <input type="number" id="online_mark5" name="online_mark5" min="0" max="100">
                    </div>
                </div>
                <!-- Online Course 6 -->
                <div class="online-course-group">
                    <h3>Online Course 6</h3>
                    <div class="online-course-item">
                        <label for="online_course6">Course Name:</label>
                        <input type="text" id="online_course6" name="online_course6">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark6">Mark:</label>
                        <input type="number" id="online_mark6" name="online_mark6" min="0" max="100">
                    </div>
                </div>
                <!-- Online Course 7 -->
                <div class="online-course-group">
                    <h3>Online Course 7</h3>
                    <div class="online-course-item">
                        <label for="online_course7">Course Name:</label>
                        <input type="text" id="online_course7" name="online_course7">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark7">Mark:</label>
                        <input type="number" id="online_mark7" name="online_mark7" min="0" max="100">
                    </div>
                </div>
                <!-- Online Course 8 -->
                <div class="online-course-group">
                    <h3>Online Course 8</h3>
                    <div class="online-course-item">
                        <label for="online_course8">Course Name:</label>
                        <input type="text" id="online_course8" name="online_course8">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark8">Mark:</label>
                        <input type="number" id="online_mark8" name="online_mark8" min="0" max="100">
                    </div>
                </div>
                <!-- Online Course 9 -->
                <div class="online-course-group">
                    <h3>Online Course 9</h3>
                    <div class="online-course-item">
                        <label for="online_course9">Course Name:</label>
                        <input type="text" id="online_course9" name="online_course9">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark9">Mark:</label>
                        <input type="number" id="online_mark9" name="online_mark9" min="0" max="100">
                    </div>
                </div>
                <!-- Online Course 10 -->
                <div class="online-course-group">
                    <h3>Online Course 10</h3>
                    <div class="online-course-item">
                        <label for="online_course10">Course Name:</label>
                        <input type="text" id="online_course10" name="online_course10">
                    </div>
                    <div class="online-course-item">
                        <label for="online_mark10">Mark:</label>
                        <input type="number" id="online_mark10" name="online_mark10" min="0" max="100">
                    </div>
                </div>
                <!-- Add more courses as needed -->
            </div>
        </div>

        <!-- Attendance Section -->
        <div class="form-section attendance-container">
            <h2>Attendance</h2>
            <div class="attendance-group">
                <label for="attendance_percentage">Attendance (%):</label>
                <input type="number" id="attendance_percentage" name="attendance_percentage" min="0" max="100" required>
            </div>
            <div class="attendance-group">
                <label for="attendance_mark">Attendance Mark:</label>
                <input type="number" id="attendance_mark" name="attendance_mark" min="0" max="100" required>
            </div>
        </div>

        <!-- Disclaimer Section -->
        <div class="disclaimer">
            <p>Disclaimer: Enter the correct and appropriate details.</p>
            <p>Disclaimer: Make sure the entered details are correct.</p>
            <p>Disclaimer: After entering the details, click the submit button.</p>
        </div>
		
		<!-- Submit Button -->
        <div class="submit-container">
            <button type="submit" class="submit-button">Submit</button>
        </div>
    </form>

</body>
</html>
