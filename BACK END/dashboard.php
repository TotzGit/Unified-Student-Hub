<?php
// Include the Composer autoloader
require 'vendor/autoload.php';

// Use PhpSpreadsheet classes
use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['excelFile'])) {
    // Read the uploaded Excel file
    $file = $_FILES['excelFile']['tmp_name'];
    $spreadsheet = IOFactory::load($file);
    $data = $spreadsheet->getActiveSheet()->toArray();  // Convert sheet data to array

    $categories = [
        'Technical Events' => [],
        'Cultural Events' => [],
        'Academic Events' => [],
        'Sports/Social Events' => [],
        'Online Course' => []
    ];

    $currentCategory = null;

    // Extract data for all event categories and online courses
    foreach ($data as $row) {
        if (is_array($row) && !empty($row[0])) {
            $header = strtolower(trim($row[0]));

            // Check for category headers
            foreach ($categories as $category => &$events) {
                if (strpos($header, strtolower($category)) !== false) {
                    $currentCategory = $category;
                    continue 2;
                }
            }

            // Add data to the current category
            if ($currentCategory && isset($row[1]) && is_numeric($row[1])) {
                $categories[$currentCategory][$row[0]] = (int)$row[1];
            }
        }
    }

    // Generate feedback
    $feedback = [];

    foreach ($categories as $category => $events) {
        $totalScore = array_sum($events);

        if ($totalScore < 50 * count($events)) {
            $feedback[] = "Participation in $category is below average. Consider increasing your involvement.";
        } else {
            $feedback[] = "Great job in $category! Keep up the excellent participation.";
        }
    }

    // Pass data to JavaScript
    echo "
        <script>
        var eventCategories = " . json_encode(array_keys($categories)) . ";
        var categoryData = " . json_encode($categories) . ";
        var feedbackComments = " . json_encode($feedback) . ";
        </script>
    ";
}
?>
