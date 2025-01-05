<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile Form</title>
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
	height: 100px;
	text-align: center;
}

h3 {
    text-align: center;
}

form {
    text-align: center;
    margin-top: 20px;
}
      /* White text on hover */
    </style>
</head>
<body>
<div class="container">
<?php 
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST['name'] ?? '';
    $gmail = $_POST['gmail'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $department = $_POST['department'] ?? '';
    $year = $_POST['year'] ?? '';
    $roll_no = $_POST['roll_no'] ?? '';
    $blood_group = $_POST['blood_group'] ?? '';
	$studying_year = $_POST['studying_year'] ?? '';
    $attendance_percentage = $_POST['attendance_percentage'] ?? '';
    $attendance_mark = $_POST['attendance_mark'] ?? '';
    
    $technical_events = [];
    for ($i = 1; $i <= 6; $i++) {
        $event = $_POST["tech_event$i"] ?? '';
        $mark = $_POST["tech_mark$i"] ?? '';
        if ($event || $mark) {
            $technical_events[] = [$event, $mark];
        }
    }

    // Cultural Events
    $cultural_events = [];
    for ($i = 1; $i <= 6; $i++) {
        $event = $_POST["cultural_event$i"] ?? '';
        $mark = $_POST["cultural_mark$i"] ?? '';
        if ($event || $mark) {
            $cultural_events[] = [$event, $mark];
        }
    }

    // Academic Events
    $academic_events = [];
    for ($i = 1; $i <= 6; $i++) {
        $event = $_POST["academic_event$i"] ?? '';
        $mark = $_POST["academic_mark$i"] ?? '';
        if ($event || $mark) {
            $academic_events[] = [$event, $mark];
        }
    }

    // Sports/Social Events
    $sports_events = [];
    for ($i = 1; $i <= 6; $i++) {
        $event = $_POST["sports_event$i"] ?? '';
        $mark = $_POST["sports_mark$i"] ?? '';
        if ($event || $mark) {
            $sports_events[] = [$event, $mark];
        }
    }

    // Online Courses
    $online_courses = [];
    for ($i = 1; $i <= 10; $i++) {
        $course = $_POST["online_course$i"] ?? '';
        $mark = $_POST["online_mark$i"] ?? '';
        if ($course || $mark) {
            $online_courses[] = [$course, $mark];
        }
    }

    // Generate filename
    
    $filename = sprintf('Student_Profile_%s_%s_%s_%s_%s.xlsx', $name, $department, $roll_no, $year, $studying_year);
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . $filename;


    // Create a new spreadsheet and set the worksheet title to the year
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle($year);

    $boldTimesNewRomanStyle = [
        'font' => [
            'bold' => true,
            'name' => 'Times New Roman'
        ]
    ];

    $leftAlignStyle = [
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_LEFT
        ]
    ];

    // General Student Information
    $sheet->setCellValue('A1', 'Name')->getStyle('A1')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B1', $name)->getStyle('B1')->applyFromArray($leftAlignStyle);
    $sheet->setCellValue('A2', 'Gmail')->getStyle('A2')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B2', $gmail)->getStyle('B2')->applyFromArray($leftAlignStyle);
    $sheet->setCellValue('A3', 'Phone Number')->getStyle('A3')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B3', $phone)->getStyle('B3')->applyFromArray($leftAlignStyle);
    $sheet->setCellValue('A4', 'Address')->getStyle('A4')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B4', $address)->getStyle('B4')->applyFromArray($leftAlignStyle);
    $sheet->setCellValue('A5', 'Department')->getStyle('A5')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B5', $department)->getStyle('B5')->applyFromArray($leftAlignStyle);
    $sheet->setCellValue('A6', 'Year')->getStyle('A6')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B6', $year)->getStyle('B6')->applyFromArray($leftAlignStyle);
    $sheet->setCellValue('A7', 'Roll No')->getStyle('A7')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B7', $roll_no)->getStyle('B7')->applyFromArray($leftAlignStyle);
    $sheet->setCellValue('A8', 'Blood Group')->getStyle('A8')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B8', $blood_group)->getStyle('B8')->applyFromArray($leftAlignStyle);
    $sheet->setCellValue('A9', 'Attendance')->getStyle('A9')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B9', $attendance_percentage)->getStyle('B9')->applyFromArray($leftAlignStyle);
    $sheet->setCellValue('C9', 'Marks')->getStyle('C9')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('D9', $attendance_mark)->getStyle('D9')->applyFromArray($leftAlignStyle);
	$sheet->setCellValue('A10', 'Studying Year')->getStyle('A10')->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue('B10', $studying_year)->getStyle('B10')->applyFromArray($leftAlignStyle);

    // Add Event Data
    function addEventData($sheet, $rowStart, $title, $events, $headerStyle, $leftAlignStyle) {
        $sheet->setCellValue("A$rowStart", $title)->getStyle("A$rowStart")->applyFromArray($headerStyle);
        $sheet->setCellValue("B$rowStart", 'Events')->getStyle("B$rowStart")->applyFromArray($headerStyle);
        $sheet->setCellValue("C$rowStart", 'Marks')->getStyle("C$rowStart")->applyFromArray($headerStyle);

        foreach ($events as $index => $event) {
            $row = $rowStart + 1 + $index;
            $sheet->setCellValue("B$row", $event[0])->getStyle("B$row")->applyFromArray($leftAlignStyle); // Event name
            $sheet->setCellValue("C$row", $event[1])->getStyle("C$row")->applyFromArray($leftAlignStyle); // Non-bold, left-aligned marks
        }
    }

    // Adding data to specified cells
    addEventData($sheet, 11, 'Technical Events', $technical_events, $boldTimesNewRomanStyle, $leftAlignStyle);
    addEventData($sheet, 19, 'Cultural Events', $cultural_events, $boldTimesNewRomanStyle, $leftAlignStyle);
    addEventData($sheet, 28, 'Academic Events', $academic_events, $boldTimesNewRomanStyle, $leftAlignStyle);
    addEventData($sheet, 36, 'Sports/Social Events', $sports_events, $boldTimesNewRomanStyle, $leftAlignStyle);

    // Adding Online Courses
    $sheet->setCellValue("A44", 'Online Course')->getStyle("A44")->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue("B44", 'Course Name')->getStyle("B44")->applyFromArray($boldTimesNewRomanStyle);
    $sheet->setCellValue("C44", 'Marks')->getStyle("C44")->applyFromArray($boldTimesNewRomanStyle);
    foreach ($online_courses as $index => $course) {
        $row = 45 + $index;
        $sheet->setCellValue("B$row", $course[0])->getStyle("B$row")->applyFromArray($leftAlignStyle); // Course name
        $sheet->setCellValue("C$row", $course[1])->getStyle("C$row")->applyFromArray($leftAlignStyle); // Non-bold, left-aligned marks
    }

    // Save the spreadsheet
    $writer = new Xlsx($spreadsheet);
    try {
        $writer->save($filePath);
    } catch (Exception $e) {
        die('Error saving spreadsheet: ' . $e->getMessage());
    }

    // Output message and button based on the file's status
    echo '<style>
        .button {
            background-color: white;  
            color: #4CAF50;           
            padding: 10px 30px;
            border: 2px solid #4CAF50;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
			margin-left:38px;
            transition: 0.3s;
        }
        .button:hover {
            background-color: #4CAF50;
            color: white;
        }
		
        .message {
        margin-bottom: 30px; /* Add bottom margin to the <p> */
        }		
    </style>';

    echo "<center><p class='message'>File created successfully: $filename</p></center>";
    echo "<a href='$filename' download='$filename' class='button'>Download File</a>";
}
?>
</div>
</body>
</html>



