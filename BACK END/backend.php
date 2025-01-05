<?php
// Include PHPSpreadsheet library
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

function calculateFeedback($score, $event) {
    if ($score < 250) {
        return "Join more $event events to improve marks.";
    } else {
        return "Good participation in $event events.";
    }
}

if (isset($_POST['upload'])) {
    try {
        $file = $_FILES['excel_file']['tmp_name'];

        // Load the uploaded file using PhpSpreadsheet
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();

        // Define cell ranges for each category (replace with actual cell references)
        $technicalScoreCells = 'D4:G4'; 
        $academicScoreCells = 'I4:M4'; 
        $sportsScoreCells = 'O4:S4'; 
        $culturalScoreCells = 'U4:Y4'; 
        $onlineCoursesCell = 'AA4'; 
        $attendanceCell = 'AB4'; 

        $feedback = '';
        $chartData = [
            'technical' => 0,
            'academic' => 0,
            'sports' => 0,
            'cultural' => 0,
            'attendance' => 0,
            'onlineCourses' => 0
        ];

        // Process student data (assuming only one student row for now)
        $rowData = [];
        $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        foreach ($cellIterator as $cell) {
            $rowData[] = $cell->getValue();
        }

        // Calculate scores with data validation
        $technicalScores = $sheet->range($technicalScoreCells)->toArray()[0];
        if (array_filter($technicalScores, 'is_numeric') == $technicalScores) {
            $technicalScore = array_sum($technicalScores);
        } else {
            $technicalScore = 0; // Handle invalid data
            $feedback .= "<p><strong>Warning:</strong> Invalid data in Technical Events.</p>";
        }

        $academicScores = $sheet->range($academicScoreCells)->toArray()[0];
        if (array_filter($academicScores, 'is_numeric') == $academicScores) {
            $academicScore = array_sum($academicScores);
        } else {
            $academicScore = 0;
            $feedback .= "<p><strong>Warning:</strong> Invalid data in Academic Events.</p>";
        }

        $sportsScores = $sheet->range($sportsScoreCells)->toArray()[0];
        if (array_filter($sportsScores, 'is_numeric') == $sportsScores) {
            $sportsScore = array_sum($sportsScores);
        } else {
            $sportsScore = 0;
            $feedback .= "<p><strong>Warning:</strong> Invalid data in Sports Events.</p>";
        }

        $culturalScores = $sheet->range($culturalScoreCells)->toArray()[0];
        if (array_filter($culturalScores, 'is_numeric') == $culturalScores) {
            $culturalScore = array_sum($culturalScores);
        } else {
            $culturalScore = 0;
            $feedback .= "<p><strong>Warning:</strong> Invalid data in Cultural Events.</p>";
        }

        $onlineCourses = $sheet->getCell($onlineCoursesCell)->getValue();
        if (is_numeric($onlineCourses)) {
            $onlineCourses = (int)$onlineCourses; // Ensure integer value
        } else {
            $onlineCourses = 0;
            $feedback .= "<p><strong>Warning:</strong> Invalid data in Online Courses.</p>";
        }

        $attendance = $sheet->getCell($attendanceCell)->getValue();
        if (is_numeric($attendance)) {
            $attendance = (int)$attendance; // Ensure integer value
        } else {
            $attendance = 0;
            $feedback .= "<p><strong>Warning:</strong> Invalid data in Attendance.</p>";
        }

        // Generate feedback for each category
        $feedback .= "<p><strong>Technical Events:</strong> " . calculateFeedback($technicalScore, 'tech') . "</p>";
        $feedback .= "<p><strong>Academic Events:</strong> " . calculateFeedback($academicScore, 'academic') . "</p>";
        $feedback .= "<p><strong>Sports/Social Events:</strong> " . calculateFeedback($sportsScore, 'sports') . "</p>";
        $feedback .= "<p><strong>Cultural Events:</strong> " . calculateFeedback($culturalScore, 'cultural') . "</p>";
        $feedback .= "<p><strong>Online Courses:</strong> " . ($onlineCourses < 3 ? "Complete more courses for better marks." : "Great work with online courses!") . "</p>";
        $feedback .= "<p><strong>Attendance:</strong> " . ($attendance < 75 ? "Not enough attendance." : "Perfect Attendance!") . "</p>";

        // Collect data for the chart
        $chartData['technical'] += $technicalScore;
        $chartData['academic'] += $academicScore;
        $chartData['sports'] += $sportsScore;
        $chartData['cultural'] += $culturalScore;
        $chartData['attendance'] += $attendance;
        $chartData['onlineCourses'] += $onlineCourses;

        // Return the feedback and chart data to frontend
        echo json_encode([
            'feedback' => $feedback,
            'chartData' => $chartData
        ]);

    } catch (Exception $e) {
        // Handle exceptions gracefully
        echo json_encode([
            'error' => 'Error processing file: ' . $e->getMessage()
        ]);
    }
}
?>