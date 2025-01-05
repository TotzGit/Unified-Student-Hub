<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<title>updation</title>
    <style>
        body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-image: url('slide2.jpg'); /* Make sure to update the paths to your images */
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center center;
    font-family: 'Poppins', sans-serif;
    color: #fff; /* Adjust color to ensure text is readable */
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
    opacity: 0.4; /* Adjust background image opacity */
    z-index: -1; /* Keep the overlay behind the content */
}

.container {
    width: 80%;
    max-width: 900px; /* Adjust the max-width for better responsiveness */
    margin: 0 auto;
    padding: 20px;
    background: rgba(0, 0, 0, 0.6); /* Slight transparency to the container */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
	text-align: center; /* Center text horizontally */
    display: flex; /* Use flexbox for centering */
    flex-direction: column; /* Align children in a column */
    justify-content: center; /* Center children vertically */
    align-items: center; /* Center children horizontally */
    font-family: 'Poppins', sans-serif; /* Ensure the Poppins font is applied */
    font-weight: bold;
}

h3 {
    text-align: center;
}

form {
    text-align: center;
    margin-top: 20px;
}

button {
    background-color: white;  /* White background */
    color: #4CAF50;           /* Green text color */
    padding: 10px 20px;
    border: 2px solid #4CAF50; /* Add a green border */
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for hover */
}

button:hover {
    background-color: #4CAF50; /* Green background on hover */
    color: white;              /* White text on hover */
}

    </style>
</head>
<body>
    <div class="container">
<?php
// Make sure to include any required libraries like PhpSpreadsheet if not already included
require 'vendor/autoload.php'; // Adjust the path as needed
use PhpOffice\PhpSpreadsheet\IOFactory;

// Function to safely retrieve POST values
function get_post_value($key) {
    return isset($_POST[$key]) ? trim($_POST[$key]) : null;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve student details including studying year
    $student_name = trim($_POST['student_name']);
    $department = trim($_POST['department']);
    $roll_no = trim($_POST['roll_no']);
    $year = trim($_POST['year']);
    $studying_year = trim($_POST['studying_year']); // Capture the new studying_year field

    // Construct the file name based on the student details, including the studying year
    $file_name = "Student_Profile_{$student_name}_{$department}_{$roll_no}_{$year}_{$studying_year}.xlsx";
    $file_path = "C:\\Users\\arisc\\Downloads\\" . $file_name; // Adjust the path as necessary

    // Ensure the file exists
    if (!file_exists($file_path)) {
        die("The file does not exist at the specified path: $file_path");
    }

    // Try to load the spreadsheet
    try {
        $spreadsheet = IOFactory::load($file_path);
    } catch (Exception $e) {
        die("Error loading spreadsheet: " . $e->getMessage());
    }

    $sheet = $spreadsheet->getActiveSheet();

    // Update Technical Events
    for ($i = 1; $i <= 6; $i++) {
        $event = get_post_value("tech_event_$i");
        $marks = get_post_value("tech_marks_$i");

        if (!empty($event)) {
            $sheet->setCellValue("B" . (11 + $i), $event);
        }
        if (!empty($marks) && is_numeric($marks)) {
            $sheet->setCellValue("C" . (11 + $i), $marks);
        }
    }

    // Update Cultural Events
    for ($i = 1; $i <= 6; $i++) {
        $event = get_post_value("cult_event_$i");
        $marks = get_post_value("cult_marks_$i");

        if (!empty($event)) {
            $sheet->setCellValue("B" . (19 + $i), $event);
        }
        if (!empty($marks) && is_numeric($marks)) {
            $sheet->setCellValue("C" . (19 + $i), $marks);
        }
    }

    // Update Academic Events
    for ($i = 1; $i <= 6; $i++) {
        $event = get_post_value("acad_event_$i");
        $marks = get_post_value("acad_marks_$i");

        if (!empty($event)) {
            $sheet->setCellValue("B" . (28 + $i), $event);
        }
        if (!empty($marks) && is_numeric($marks)) {
            $sheet->setCellValue("C" . (28 + $i), $marks);
        }
    }

    // Update Sports/Social Events
    for ($i = 1; $i <= 6; $i++) {
        $event = get_post_value("sports_event_$i");
        $marks = get_post_value("sports_marks_$i");

        if (!empty($event)) {
            $sheet->setCellValue("B" . (36 + $i), $event);
        }
        if (!empty($marks) && is_numeric($marks)) {
            $sheet->setCellValue("C" . (36 + $i), $marks);
        }
    }

    // Update Online Courses
    for ($i = 1; $i <= 10; $i++) {
        $course = get_post_value("online_course_$i");
		$marks = get_post_value("online_course_marks$i");

        if (!empty($course)) {
            $sheet->setCellValue("B" . (44 + $i), $course);
        }
		if (!empty($marks) && is_numeric($marks)) {
            $sheet->setCellValue("C" . (44 + $i), $marks);
        }
    }

    // Save the updated spreadsheet
    try {
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($file_path);
        echo "Event details updated successfully!";
    } catch (Exception $e) {
        die("Error saving spreadsheet: " . $e->getMessage());
    }
}
?>
</div>
</body>
</html>