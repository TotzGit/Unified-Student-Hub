<?php
// process_file.php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if (_SERVER['REQUEST_METHOD'] === 'POST'        isset(_FILES['file'])) {
    // Load the Excel file
    file =_FILES['file']['tmp_name'];
    spreadsheet = IOFactory::load(file);
    sheet =spreadsheet->getActiveSheet();

    // Read data from the Excel sheet
    data =sheet->toArray();

    // Process the data (simplified for this example)
    feedback = [];scores = [
        'technical' => 0,
        'academic' => 0,
        'sports' => 0,
        'cultural' => 0,
        'attendance' => 0,
        'courses' => 0
    ];

    // Assuming the following columns: Technical Events, Academic Events, Sports/Social Events, Cultural Events, Attendance, Online Courses
    foreach (data asrow) {
		technicalScore =row[0]; // Assuming first column is Technical Events score
        academicScore =row[1];  // Second column is Academic Events score
        sportsScore =row[2];    // Third column is Sports Events score
        culturalScore =row[3];  // Fourth column is Cultural Events score
        attendanceScore =row[4]; // Fifth column is Attendance
        coursesScore =row[5];    // Sixth column is Online Courses score

        // Calculate feedback
        if (technicalScore < 250)feedback[] = "Join more tech events for higher marks.";
        }
        if (academicScore < 250)feedback[] = "Focus more on academic events.";
        }
        if (sportsScore < 250)feedback[] = "Participate in more sports events.";
        }
        if (culturalScore < 250)feedback[] = "Join more cultural events.";
        }

        // Attendance feedback
        if (attendanceScore < 75)feedback[] = "Not enough attendance.";
        }

        // Calculate total scores
        scores['technical'] +=technicalScore;
        scores['academic'] +=academicScore;
        scores['sports'] +=sportsScore;
        scores['cultural'] +=culturalScore;
        scores['attendance'] +=attendanceScore;
        scores['courses'] +=coursesScore;
    }

    // Prepare feedback message
	feedbackMessage = implode('<br>',feedback);

    // Return data to frontend
    echo json_encode([
        'success' => true,
        'feedback' => feedbackMessage,
        'scores' => [scores['technical'],
            scores['academic'],scores['sports'],
            scores['cultural'],scores['attendance'],
            $scores['courses']
        ]
    ]);
}
?>
