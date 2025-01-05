<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<script>
document.addEventListener('DOMContentLoaded', (event) => {
    let inputs = Array.from(document.querySelectorAll('input[type="text"], input[type="email"], input[type="number"], textarea'));
    let rows = [];
    let currentRow = 0;

    function organizeInputsIntoRows(inputs) {
        let currentRowInputs = [];
        inputs.forEach((input, index) => {
            if (index > 0 && index % 4 === 0) { // Assuming 4 inputs per row
                rows.push(currentRowInputs);
                currentRowInputs = [];
            }
            currentRowInputs.push(input);
        });
        if (currentRowInputs.length > 0) {
            rows.push(currentRowInputs);
        }
    }

    organizeInputsIntoRows(inputs);

    function getNextInput(currentInput, direction) {
        let rowIndex, colIndex;
        
        // Find current input's position in the rows array
        for (let r = 0; r < rows.length; r++) {
            let row = rows[r];
            for (let c = 0; c < row.length; c++) {
                if (row[c] === currentInput) {
                    rowIndex = r;
                    colIndex = c;
                    break;
                }
            }
        }

        let nextInput;
        switch (direction) {
            case 'ArrowUp':
                if (rowIndex > 0) {
                    nextInput = rows[rowIndex - 1][colIndex] || rows[rowIndex - 1][rows[rowIndex - 1].length - 1];
                }
                break;
            case 'ArrowDown':
                if (rowIndex < rows.length - 1) {
                    nextInput = rows[rowIndex + 1][colIndex] || rows[rowIndex + 1][0];
                }
                break;
            case 'ArrowLeft':
                nextInput = rows[rowIndex][colIndex - 1] || rows[rowIndex][rows[rowIndex].length - 1];
                break;
            case 'ArrowRight':
                nextInput = rows[rowIndex][colIndex + 1] || rows[rowIndex][0];
                break;
        }

        return nextInput;
    }

    inputs.forEach(input => {
        input.addEventListener('keydown', (e) => {
            let nextInput = getNextInput(e.target, e.key);
            if (nextInput) {
                nextInput.focus();
                e.preventDefault(); // Prevent the default action
            }
        });
    });
});
</script>


    <title>Student Information Form</title>
    <style>
	    body {
        background-image: url('slide2.jpg'); /* Make sure to update the paths to your images */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position:Center Center; /* Center both images */
        font-family: Arial, sans-serif;
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

	.academic-header {
    text-align: left;
    font-size: 25px;
    padding-bottom: 15px;
    color: white; /* Text color */
    font-family: 'Poppins', sans-serif; /* Font family */
    font-weight: 700; /* Use bold weight */
    }
	
		h1 {
            color: white;
            font-size: 36px;
            text-align: center;
        }
		
	input[type="text"] {
    border-radius: 8px; /* Rounded corners */
    padding: 10px; /* Space inside the input */
    border: 4px solid black; /* Black border */
    color: white; /* White text color */
    background-color: transparent; /* Make background transparent or choose a color */
    }
	
    input[type="number"] {
    border-radius: 8px; /* Rounded corners */
    padding: 10px; /* Space inside the input */
    border: 4px solid black; /* Black border */
    color: white; /* White text color */
    background-color: transparent; /* Make background transparent or choose a color */
    }
	
    input[type="email"] {
    border-radius: 8px; /* Rounded corners */
    padding: 10px; /* Space inside the input */
    border: 4px solid black; /* Black border */
    color: white; /* White text color */
    background-color: transparent; /* Make background transparent or choose a color */
    }
	
	#disclaimer-table {
  margin-top: 20px; /* Adjust margin as needed */
  margin-left:70px;
  margin-right:-60px;
  text-align: right; /* Center the disclaimer */
  font-size: 20px;
  font-family: 'Poppins', sans-serif;
  color: white;
}
	input[type="number"]#attendance {
  /* ... other styles ... */
  margin-right: 350px; /* Adjust this value to control the spacing */
}
.white-label {
    font-size: 20px;
    color: white; /* White label text */
    font-family: 'Poppins', sans-serif;
}
        .table-spacing {
            margin-bottom: 30px; /* Adjust this value for consistent spacing */
        }
		
		dis {
			margin-bottom:1px;
		}

        .submit-container {
            display: flex;
            justify-content: Center;   /* Center the submit button */
            width: 100%;               /* Full width to keep it centered */
            margin-top:-89px;
			margin-bottom: 20px;
			
        }

        .submit-button {
			margin-right: -170px;
            font-size: 20px;     /* Make the font size larger */
            padding: 10px 20px;  /* Add padding for larger button size */
            background-color: #4CAF50; /* Green background color */
            color: white;        /* White text color */
            border: none;        /* Remove default border */
            border-radius: 5px;  /* Rounded corners */
            cursor: pointer;     /* Pointer cursor on hover */
            transition: all 0.3s ease; /* Smooth transition for all properties */
            animation: pulse 2s infinite; /* Apply pulse animation */
        }
        .submit-button:hover {
            background-color: #45a049; /* Darker green on hover */
            transform: scale(1.05);    /* Slightly enlarge the button on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
        }

        .submit-button:active {
            transform: scale(1);       /* Return to original size on click */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Smaller shadow on click */
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
            display: flex;          /* Use Flexbox for alignment */
            justify-content: space-between; /* Space out the tables */
            gap: 30px;              /* Space between tables */
        }

        .table-container {
            width: 48%;             /* Adjust width to fit side by side */
        }

        .right-align {
            text-align: right;      /* Align content to the right */
        }
		
		.attendance-container {
         display: flex;
         flex-direction: column;    /* Stack the attendance and button vertically */
         align-items: flex-end;     /* Align content to the right */
         width: 100%;               /* Full width of the container */
         margin-bottom: 30px;
         margin-top: -300px;		 /* Add some spacing below the container */
        }
		
		/* Responsive for tablets and small screens */
        @media (max-width: 768px) {
            .form-group {
                flex: 1 1 100%; /* Single element per row */
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

    </style>
</head>
<body>
    <center><h1>Student Information Form</h1></center>
    <form action="" method="post">
        <!-- First Table -->
        <table style="border-spacing: 20px; width: 100%;">
            <tr>
                <td><label for="name" class="white-label" style="font-size: 20px;">Name:</label></td>
                <td><input type="text" id="name" name="name" required></td>
                
                <td><label for="gmail" class="white-label" style="font-size: 20px;">Gmail:</label></td>
                <td><input type="email" id="gmail" name="gmail" required></td>
                
                <td><label for="phone" class="white-label" style="font-size: 20px;">Phone Number:</label></td>
                <td><input type="number" id="phone" name="phone" required></td>
                
                <td><label for="address" class="white-label" style="font-size: 20px;">Address:</label></td>
                <td><input type="text" id="address" name="address" required></td>
            </tr>
            <tr>
                <td><label for="department" class="white-label" style="font-size: 20px;">Department:</label></td>
                <td><input type="text" id="department" name="department" required></td>
                
                <td><label for="year" class="white-label" style="font-size: 20px;">Year:</label></td>
                <td><input type="text" id="year" name="year" required></td>
                
                <td><label for="roll_no" class="white-label" style="font-size: 20px;">Roll No:</label></td>
                <td><input type="text" id="roll_no" name="roll_no" required></td>
                
                <td><label for="blood_group" class="white-label" style="font-size: 20px;">Blood Group:</label></td>
                <td><input type="text" id="blood_group" name="blood_group" required></td>
            </tr>
        </table>

        <!-- Flexbox Container for Technical and Cultural Events -->

        <div class="tables-container">
            <!-- Technical Events Table -->
            <div class="table-container">
                <table class="table-spacing" style="border-spacing: 15px; width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="4" class="academic-header" style="text-align: left; font-size: 25px; padding-bottom: 15px;">Technical Events</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><label for="technical_event1" class="white-label" style="font-size: 20px;">Event 1:</label></td>
                        <td><input type="text" id="technical_event1" name="technical_event1"></td>
                        <td><label for="technical_mark1" class="white-label" style="font-size: 20px;">Mark 1:</label></td>
                        <td><input type="number" id="technical_mark1" name="technical_mark1" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="technical_event2" class="white-label" style="font-size: 20px;">Event 2:</label></td>
                        <td><input type="text" id="technical_event2" name="technical_event2"></td>
                        <td><label for="technical_mark2" class="white-label" style="font-size: 20px;">Mark 2:</label></td>
                        <td><input type="number" id="technical_mark2" name="technical_mark2" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="technical_event3" class="white-label" style="font-size: 20px;">Event 3:</label></td>
                        <td><input type="text" id="technical_event3" name="technical_event3"></td>
                        <td><label for="technical_mark3" class="white-label" style="font-size: 20px;">Mark 3:</label></td>
                        <td><input type="number" id="technical_mark3" name="technical_mark3" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="technical_event4" class="white-label" style="font-size: 20px;">Event 4:</label></td>
                        <td><input type="text" id="technical_event4" name="technical_event4"></td>
                        <td><label for="technical_mark4" class="white-label" style="font-size: 20px;">Mark 4:</label></td>
                        <td><input type="number" id="technical_mark4" name="technical_mark4" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="technical_event5" class="white-label" style="font-size: 20px;">Event 5:</label></td>
                        <td><input type="text" id="technical_event5" name="technical_event5"></td>
                        <td><label for="technical_mark5" class="white-label" style="font-size: 20px;">Mark 5:</label></td>
                        <td><input type="number" id="technical_mark5" name="technical_mark5" min="0" max="100"></td>
                    </tr>
                </table>
            </div>

            <!-- Cultural Events Table -->
            <div class="table-container">
                <table class="table-spacing" style="border-spacing: 15px; width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="4" class="academic-header" style="text-align: left; font-size: 25px; padding-bottom: 15px;">Cultural Events</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><label for="cultural_event1" class="white-label" style="font-size: 20px;">Event 1:</label></td>
                        <td><input type="text" id="cultural_event1" name="cultural_event1"></td>
                        <td><label for="cultural_mark1" class="white-label" style="font-size: 20px;">Mark 1:</label></td>
                        <td><input type="number" id="cultural_mark1" name="cultural_mark1" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="cultural_event2" class="white-label" style="font-size: 20px;">Event 2:</label></td>
                        <td><input type="text" id="cultural_event2" name="cultural_event2"></td>
                        <td><label for="cultural_mark2" class="white-label" style="font-size: 20px;">Mark 2:</label></td>
                        <td><input type="number" id="cultural_mark2" name="cultural_mark2" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="cultural_event3" class="white-label" style="font-size: 20px;">Event 3:</label></td>
                        <td><input type="text" id="cultural_event3" name="cultural_event3"></td>
                        <td><label for="cultural_mark3" class="white-label" style="font-size: 20px;">Mark 3:</label></td>
                        <td><input type="number" id="cultural_mark3" name="cultural_mark3" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="cultural_event4" class="white-label" style="font-size: 20px;">Event 4:</label></td>
                        <td><input type="text" id="cultural_event4" name="cultural_event4"></td>
                        <td><label for="cultural_mark4" class="white-label" style="font-size: 20px;">Mark 4:</label></td>
                        <td><input type="number" id="cultural_mark4" name="cultural_mark4" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="cultural_event5" class="white-label" style="font-size: 20px;">Event 5:</label></td>
                        <td><input type="text" id="cultural_event5" name="cultural_event5"></td>
                        <td><label for="cultural_mark5" class="white-label" style="font-size: 20px;">Mark 5:</label></td>
                        <td><input type="number" id="cultural_mark5" name="cultural_mark5" min="0" max="100"></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Academic and Sports/Social Events Table -->
        <div class="tables-container">
            <!-- Academic Events Table -->
            <div class="table-container">
                <table class="table-spacing" style="border-spacing: 15px; width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="4" class="academic-header" style="text-align: left; font-size: 25px; padding-bottom: 15px;">Academic Events</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><label for="academic_event1" class="white-label" style="font-size: 20px;">Event 1:</label></td>
                        <td><input type="text" id="academic_event1" name="academic_event1"></td>
                        <td><label for="academic_mark1" class="white-label" style="font-size: 20px;">Mark 1:</label></td>
                        <td><input type="number" id="academic_mark1" name="academic_mark1" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="academic_event2" class="white-label" style="font-size: 20px;">Event 2:</label></td>
                        <td><input type="text" id="academic_event2" name="academic_event2"></td>
                        <td><label for="academic_mark2" class="white-label" style="font-size: 20px;">Mark 2:</label></td>
                        <td><input type="number" id="academic_mark2" name="academic_mark2" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="academic_event3" class="white-label" style="font-size: 20px;">Event 3:</label></td>
                        <td><input type="text" id="academic_event3" name="academic_event3"></td>
                        <td><label for="academic_mark3" class="white-label" style="font-size: 20px;">Mark 3:</label></td>
                        <td><input type="number" id="academic_mark3" name="academic_mark3" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="academic_event4" class="white-label" style="font-size: 20px;">Event 4:</label></td>
                        <td><input type="text" id="academic_event4" name="academic_event4"></td>
                        <td><label for="academic_mark4" class="white-label" style="font-size: 20px;">Mark 4:</label></td>
                        <td><input type="number" id="academic_mark4" name="academic_mark4" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="academic_event5" class="white-label" style="font-size: 20px;">Event 5:</label></td>
                        <td><input type="text" id="academic_event5" name="academic_event5"></td>
                        <td><label for="academic_mark5" class="white-label" style="font-size: 20px;">Mark 5:</label></td>
                        <td><input type="number" id="academic_mark5" name="academic_mark5" min="0" max="100"></td>
                    </tr>
                </table>
            </div>

            <!-- Sports/Social Events Table -->
            <div class="table-container">
                <table class="table-spacing" style="border-spacing: 15px; width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="4" class="academic-header" style="text-align: left; font-size: 25px; padding-bottom: 15px;">Sports/Social Events</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><label for="sports_event1" class="white-label" style="font-size: 20px;">Event 1:</label></td>
                        <td><input type="text" id="sports_event1" name="sports_event1"></td>
                        <td><label for="sports_mark1" class="white-label" style="font-size: 20px;">Mark 1:</label></td>
                        <td><input type="number" id="sports_mark1" name="sports_mark1" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="sports_event2" class="white-label" style="font-size: 20px;">Event 2:</label></td>
                        <td><input type="text" id="sports_event2" name="sports_event2"></td>
                        <td><label for="sports_mark2" class="white-label" style="font-size: 20px;">Mark 2:</label></td>
                        <td><input type="number" id="sports_mark2" name="sports_mark2" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="sports_event3" class="white-label" style="font-size: 20px;">Event 3:</label></td>
                        <td><input type="text" id="sports_event3" name="sports_event3"></td>
                        <td><label for="sports_mark3" class="white-label" style="font-size: 20px;">Mark 3:</label></td>
                        <td><input type="number" id="sports_mark3" name="sports_mark3" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="sports_event4" class="white-label" style="font-size: 20px;">Event 4:</label></td>
                        <td><input type="text" id="sports_event4" name="sports_event4"></td>
                        <td><label for="sports_mark4" class="white-label" style="font-size: 20px;">Mark 4:</label></td>
                        <td><input type="number" id="sports_mark4" name="sports_mark4" min="0" max="100"></td>
                    </tr>
                    <tr>
                        <td><label for="sports_event5" class="white-label" style="font-size: 20px;">Event 5:</label></td>
                        <td><input type="text" id="sports_event5" name="sports_event5"></td>
                        <td><label for="sports_mark5" class="white-label" style="font-size: 20px;">Mark 5:</label></td>
                        <td><input type="number" id="sports_mark5" name="sports_mark5" min="0" max="100"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="table-container">
                <table class="table-spacing" style="border-spacing: 15px; width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="4" class="academic-header" style="text-align: left; font-size: 25px; padding-bottom: 15px;">Online Courses</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><label for="online_course1" class="white-label" style="font-size: 20px;">Course 1:</label></td>
                        <td><input type="text" id="online_course1" name="online_course1"></td>
                        <td><label for="online_course6" class="white-label" style="font-size: 20px;">Course 6:</label></td>
                        <td><input type="text" id="online_course6" name="online_course6"></td>
					</tr>
					<tr>
						<td><label for="online_course2" class="white-label" style="font-size: 20px;">Course 2:</label></td>
                        <td><input type="text" id="online_course2" name="online_course2"></td>
						<td><label for="online_course7" class="white-label" style="font-size: 20px;">Course 7:</label></td>
                        <td><input type="text" id="online_course7" name="online_course7"></td>
					</tr>
					<tr>
						<td><label for="online_course3" class="white-label" style="font-size: 20px;">Course 3:</label></td>
                        <td><input type="text" id="online_course3" name="online_course3"></td>
						<td><label for="online_course8" class="white-label" style="font-size: 20px;">Course 8:</label></td>
                        <td><input type="text" id="online_course8" name="online_course8"></td>
					</tr>
					<tr>
						<td><label for="online_course4" class="white-label" style="font-size: 20px;">Course 4:</label></td>
                        <td><input type="text" id="online_course4" name="online_course4"></td>
						<td><label for="online_course9" class="white-label" style="font-size: 20px;">Course 9:</label></td>
                        <td><input type="text" id="online_course9" name="online_course9"></td>
					</tr>
					<tr>
						<td><label for="online_course5" class="white-label" style="font-size: 20px;">Course 5:</label></td>
                        <td><input type="text" id="online_course5" name="online_course5"></td>
						<td><label for="online_course1" class="white-label" style="font-size: 20px;">Course 10:</label></td>
                        <td><input type="text" id="online_course10" name="online_course10"></td>
                    </tr>
                    <!-- Add more courses as needed -->
                </table>
            </div>
        </div>
<div class="attendance-container">
    <div class="table-container">
	   <div style="padding-top: -100px;">
        <table class="table-spacing" style="border-spacing: 15px; width: 100%; margin-top: -105px;">
            <thead>
                <tr>
                    <th colspan="4" class="academic-header" style="text-align: left; font-size: 25px; padding-bottom: 15px; margin-top: -10px;">Attendance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label for="attendance" class="white-label" style="font-size: 20px;">Attendance (%):</label></td>
                    <td><input type="number" id="attendance" name="attendance" min="0" max="100"required></td>
                </tr>
            </tbody>
        </table>
    </div>

<!-- Submit Button -->
<div class="submit-container">
    <button type="submit" class="submit-button">Submit</button>
</div>
<div class="dis1">
<table id="disclaimer-table">
  <tr>
    <td><p>Disclaimer: enter the correct and appropriate details</p></td>
  </tr>
    <tr>
    <td><p>Disclaimer: Make sure the entered details are correct</p></td>
  </tr>
  <tr>
    <td><p>Disclaimer: after entering the details click the submit button</p></td>
  </tr>
</table>
</div>
    </form>
</body>
</html>
