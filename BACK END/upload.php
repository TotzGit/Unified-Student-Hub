<?php

require 'vendor/autoload.php'; // Include PHPExcel library

use PhpOffice\PhpSpreadsheet\IOFactory;

function processStudentData($filePath) {
    try {
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        $studentData = [];
        $studentData['Name'] = $worksheet->getCell('A2')->getValue();
        $studentData['Gmail'] = $worksheet->getCell('A3')->getValue();
        $studentData['Phone Number'] = $worksheet->getCell('A4')->getValue();
        $studentData['Address'] = $worksheet->getCell('A5')->getValue();
        $studentData['Department'] = $worksheet->getCell('A6')->getValue();
        $studentData['Year'] = $worksheet->getCell('A7')->getValue();
        $studentData['Roll No'] = $worksheet->getCell('A8')->getValue();
        $studentData['Blood Group'] = $worksheet->getCell('A9')->getValue();
        $studentData['Attendance'] = (float)$worksheet->getCell('A11')->getValue(); 

        $studentData['Technical Events'] = [];
        $startRow = 13;
        for ($i = 0; $i < 6; $i++) {
            $studentData['Technical Events'][] = [
                'Event' => $worksheet->getCell('B' . ($startRow + $i))->getValue(),
                'Marks' => (float)$worksheet->getCell('C' . ($startRow + $i))->getValue(),
            ];
        }

        $studentData['Cultural Events'] = [];
        $startRow = 19;
        for ($i = 0; $i < 6; $i++) {
            $studentData['Cultural Events'][] = [
                'Event' => $worksheet->getCell('B' . ($startRow + $i))->getValue(),
                'Marks' => (float)$worksheet->getCell('C' . ($startRow + $i))->getValue(),
            ];
        }

        $studentData['Academic Events'] = [];
        $startRow = 25;
        for ($i = 0; $i < 6; $i++) {
            $studentData['Academic Events'][] = [
                'Event' => $worksheet->getCell('B' . ($startRow + $i))->getValue(),
                'Marks' => (float)$worksheet->getCell('C' . ($startRow + $i))->getValue(),
            ];
        }

        $studentData['Sports/Social Events'] = [];
        $startRow = 31;
        for ($i = 0; $i < 6; $i++) {
            $studentData['Sports/Social Events'][] = [
                'Event' => $worksheet->getCell('B' . ($startRow + $i))->getValue(),
                'Marks' => (float)$worksheet->getCell('C' . ($startRow + $i))->getValue(),
            ];
        }

        $studentData['Online Course'] = [];
        $startRow = 37;
        for ($i = 0; $i < 10; $i++) {
            $studentData['Online Course'][] = [
                'Course Name' => $worksheet->getCell('B' . ($startRow + $i))->getValue(),
                'Marks' => (float)$worksheet->getCell('C' . ($startRow + $i))->getValue(),
            ];
        }

        return $studentData;
    } catch (Exception $e) {
        echo "Error reading Excel file: " . $e->getMessage();
        return false;
    }
}

function calculateScoresAndFeedback($studentData) {
    $technicalScore = array_sum(array_column($studentData['Technical Events'], 'Marks'));
    $culturalScore = array_sum(array_column($studentData['Cultural Events'], 'Marks'));
    $academicScore = array_sum(array_column($studentData['Academic Events'], 'Marks'));
    $sportsSocialScore = array_sum(array_column($studentData['Sports/Social Events'], 'Marks'));
    $onlineCourseScore = array_sum(array_column($studentData['Online Course'], 'Marks'));

    $attendanceScore = $studentData['Attendance'];

    if ($attendanceScore >= 90) {
        $attendanceFeedback = "Perfect Attendance";
    } elseif ($attendanceScore >= 75) {
        $attendanceFeedback = "Good Attendance";
    } elseif ($attendanceScore >= 50) {
        $attendanceFeedback = "Enough Attendance";
    } else {
        $attendanceFeedback = "Low Attendance";
    }

    $technicalFeedback = ($technicalScore >= 80) ? "Good" : (($technicalScore >= 50) ? "Average" : "Bad");
    $culturalFeedback = ($culturalScore >= 80) ? "Good" : (($culturalScore >= 50) ? "Average" : "Bad");
    $academicFeedback = ($academicScore >= 80) ? "Good" : (($academicScore >= 50) ? "Average" : "Bad");
    $sportsSocialFeedback = ($sportsSocialScore >= 80) ? "Good" : (($sportsSocialScore >= 50) ? "Average" : "Bad");
    $onlineCourseFeedback = ($onlineCourseScore >= 80) ? "Good" : (($onlineCourseScore >= 50) ? "Average" : "Bad");

    $totalPossibleScore = 500 + 500 + 200 + 200 + 100 + 100; 
    $overallScore = ($technicalScore + $culturalScore + $academicScore + $sportsSocialScore + $onlineCourseScore + $attendanceScore) / $totalPossibleScore * 100;

    return [
        'scores' => [
            'Technical' => $technicalScore,
            'Cultural' => $culturalScore,
            'Academic' => $academicScore,
            'Sports/Social' => $sportsSocialScore,
            'Online Course' => $onlineCourseScore,
            'Attendance' => $attendanceScore,
        ],
        'feedback' => [
            'Technical' => $technicalFeedback,
            'Cultural' => $culturalFeedback,
            'Academic' => $academicFeedback,
            'Sports/Social' => $sportsSocialFeedback,
            'Online Course' => $onlineCourseFeedback,
            'Attendance' => $attendanceFeedback,
        ],
        'overallScore' => $overallScore,
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['studentFile'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES['studentFile']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES['studentFile']['size'] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "xlsx" && $imageFileType != "xls") {
        echo "Sorry, only XLSX and XLS files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES['studentFile']['tmp_name'], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES['studentFile']['name'])) . " has been uploaded.";

            $studentData = processStudentData($targetFile);
            if ($studentData) {
                $results = calculateScoresAndFeedback($studentData);

                echo "<h2>Student Information</h2>";
                echo "<p>Name: " . $studentData['Name'] . "</p>";
                echo "<p>Gmail: " . $studentData['Gmail'] . "</p>";
                echo "<p>Phone Number: " . $studentData['Phone Number'] . "</p>";
                echo "<p>Address: " . $studentData['Address'] . "</p>";
                echo "<p>Department: " . $studentData['Department'] . "</p>";
                echo "<p>Year: " . $studentData['Year'] . "</p>";
                echo "<p>Roll No: " . $studentData['Roll No'] . "</p>";
                echo "<p>Blood Group: " . $studentData['Blood Group'] . "</p>";

                echo "<h2>Scores and Feedback</h2>";
                foreach ($results['feedback'] as $category => $feedback) {
                    echo "<b>" . ucfirst($category) . ":</b> " . $feedback . "<br>";
                }

                echo "<b>Overall Score:</b> " . number_format($results['overallScore'], 2) . "%<br>";

                echo "<h3>Detailed Scores:</h3>";
                echo "<ul>";
                foreach ($results['scores'] as $category => $score) {
                    echo "<li><b>" . ucfirst($category) . ":</b> " . $score . "</li>";
                }
                echo "</ul>";

            } else {
                echo "Error processing student data.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>