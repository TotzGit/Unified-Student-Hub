<?php
// Ensure you have installed PHPExcel or PhpSpreadsheet
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];

    // Check if file is valid
    if (is_uploaded_file($file)) {
        try {
            $spreadsheet = IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();

            // Read necessary data from the Excel sheet
            $data = [
                'attendance_marks' => $sheet->getCell('B9')->getValue(), // Attendance percentage
                'technical_events' => [],
                'cultural_events' => [],
                'academic_events' => [],
                'sports_events' => [],
                'online_courses' => []
            ];

            // Read Technical Events (B12 to B17, C12 to C17)
            for ($i = 12; $i <= 17; $i++) {
                $event = $sheet->getCell("B$i")->getValue();
                $marks = $sheet->getCell("C$i")->getValue();
                $data['technical_events'][] = ['event' => $event, 'marks' => $marks];
            }

            // Read Cultural Events (B20 to B25, C20 to C25)
            for ($i = 20; $i <= 25; $i++) {
                $event = $sheet->getCell("B$i")->getValue();
                $marks = $sheet->getCell("C$i")->getValue();
                $data['cultural_events'][] = ['event' => $event, 'marks' => $marks];
            }

            // Read Academic Events (B29 to B34, C29 to C34)
            for ($i = 29; $i <= 34; $i++) {
                $event = $sheet->getCell("B$i")->getValue();
                $marks = $sheet->getCell("C$i")->getValue();
                $data['academic_events'][] = ['event' => $event, 'marks' => $marks];
            }

            // Read Sports Events (B37 to B42, C37 to C42)
            for ($i = 37; $i <= 42; $i++) {
                $event = $sheet->getCell("B$i")->getValue();
                $marks = $sheet->getCell("C$i")->getValue();
                $data['sports_events'][] = ['event' => $event, 'marks' => $marks];
            }

            // Read Online Courses (B45 to B54, C45 to C54)
            for ($i = 45; $i <= 54; $i++) {
                $course = $sheet->getCell("B$i")->getValue();
                $marks = $sheet->getCell("C$i")->getValue();
                $data['online_courses'][] = ['course name' => $course, 'marks' => $marks];
            }

            // Return the data as JSON
            echo json_encode($data);

        } catch (Exception $e) {
            // Handle any errors that may occur while processing the file
            echo json_encode(['error' => 'Error reading the Excel file: ' . $e->getMessage()]);
        }
    } else {
        // Handle file upload error
        echo json_encode(['error' => 'File not uploaded correctly.']);
    }
}
?>
