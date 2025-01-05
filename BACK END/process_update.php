<?php
// Include PhpSpreadsheet library
require 'vendor/autoload.php'; // Adjust the path as necessary
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Function to safely retrieve POST values
function get_post_value($key) {
    return isset($_POST[$key]) ? trim($_POST[$key]) : '';
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve student details including studying year
    $student_name = get_post_value('student_name');
    $department = get_post_value('department');
    $roll_no = get_post_value('roll_no');
    $year = get_post_value('year');
    $studying_year = get_post_value('studying_year'); // Capture the studying_year field
    $field = get_post_value('field'); // Field to update
    $new_value = get_post_value('new_value'); // New value for the field

    // Debugging step: Check if the POST data exists
    if (empty($student_name) || empty($department) || empty($roll_no) || empty($year) || empty($studying_year) || empty($field) || empty($new_value)) {
        die("Error: All fields are required.");
    }

    // Construct the file name based on the student details
    $file_name = "Student_Profile_{$student_name}_{$department}_{$roll_no}_{$year}_{$studying_year}.xlsx";
    $file_path = "C:\\Users\\arisc\\Downloads\\" . $file_name; // Update with correct path

    // Ensure the file exists
    if (!file_exists($file_path)) {
        die("The file does not exist at the specified path: $file_path");
    }

    // Load the spreadsheet
    try {
        $spreadsheet = IOFactory::load($file_path);
    } catch (Exception $e) {
        echo "<div class='message'>Error loading file: {$e->getMessage()}</div>";
        exit;
    }

    // Update the field based on the user selection
    switch ($field) {
        case 'address':
            $spreadsheet->getActiveSheet()->setCellValue('B4', $new_value); // Update address in B4
            break;
        case 'gmail':
            $spreadsheet->getActiveSheet()->setCellValue('B2', $new_value); // Update Gmail in B2
            break;
        case 'phone':
            $spreadsheet->getActiveSheet()->setCellValue('B3', $new_value); // Update Phone Number in B3
            break;
        case 'attendance':
            $spreadsheet->getActiveSheet()->setCellValue('B9', $new_value); // Update Attendance in B9
            break;
        case 'attendance_mark':
            $spreadsheet->getActiveSheet()->setCellValue('D9', $new_value); // Update Attendance Marks in D9
            break;
        default:
            echo "<div class='message'>Invalid field selected.</div>";
            exit;
    }

    // Save the updated file
    try {
        $writer = new Xlsx($spreadsheet);
        $writer->save($file_path);  // Save the updated file back to the same path

        // Display success message with custom CSS
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Update Status</title>
            <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap' rel='stylesheet'>
            <style>
                body {
                    position: relative;
                    font-family: 'Poppins', sans-serif;
                    margin: 0;
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                }
                body::before {
                    content: '';
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-image: url('slide2.jpg'); /* Background image */
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-position: center center;
                    z-index: -1;
                }
                body::after {
                    content: '';
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-image: url('bg.jpg'); /* Overlay image */
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-position: center center;
                    opacity: 0.4;
                    z-index: -1;
                }
                .message {
                    background-color: rgba(255, 255, 255, 0.9);
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    color: #333;
                    font-size: 20px;
                    z-index: 1;
                    position: relative;
                }
            </style>
        </head>
        <body>
            <div class='message'>Student details updated successfully!</div>
        </body>
        </html>";
    } catch (Exception $e) {
        echo "<div class='message'>Error saving file: {$e->getMessage()}</div>";
        exit;
    }
}
?>
