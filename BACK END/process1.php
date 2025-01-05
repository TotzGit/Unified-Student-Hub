<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\IOFactory;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $gmail = isset($_POST['gmail']) ? $_POST['gmail'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $roll_no = isset($_POST['roll_no']) ? $_POST['roll_no'] : '';
    $blood_group = isset($_POST['blood_group']) ? $_POST['blood_group'] : '';

    // Technical Events
    $technical_event1 = isset($_POST['technical_event1']) ? $_POST['technical_event1'] : '';
    $technical_mark1 = isset($_POST['technical_mark1']) ? $_POST['technical_mark1'] : '';
    // Add more events as needed

    // Cultural Events
    $cultural_event1 = isset($_POST['cultural_event1']) ? $_POST['cultural_event1'] : '';
    $cultural_mark1 = isset($_POST['cultural_mark1']) ? $_POST['cultural_mark1'] : '';
    // Add more events as needed

    // Academic Events
    $academic_event1 = isset($_POST['academic_event1']) ? $_POST['academic_event1'] : '';
    $academic_mark1 = isset($_POST['academic_mark1']) ? $_POST['academic_mark1'] : '';
    // Add more events as needed

    // Sports/Social Events
    $sports_event1 = isset($_POST['sports_event1']) ? $_POST['sports_event1'] : '';
    $sports_mark1 = isset($_POST['sports_mark1']) ? $_POST['sports_mark1'] : '';
    // Add more events as needed

    // Load the Word document
    $wordFile = 'sTUDENT pROFILE CARD.docx';
    try {
        $phpWord = IOFactory::load($wordFile);
    } catch (Exception $e) {
        die('Error loading Word document: ' . $e->getMessage());
    }

    // Extract tables from the document
    $tables = [];
    foreach ($phpWord->getSections() as $section) {
        foreach ($section->getElements() as $element) {
            if ($element instanceof \PhpOffice\PhpWord\Element\Table) {
                $tableData = [];
                foreach ($element->getRows() as $row) {
                    $rowData = [];
                    foreach ($row->getCells() as $cell) {
                        $rowData[] = $cell->getText();
                    }
                    $tableData[] = $rowData;
                }
                $tables[] = $tableData;
            }
        }
    }

    // Create a new spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set the form data in the spreadsheet
    $sheet->setCellValue('A1', 'Name')->setCellValue('B1', $name);
    $sheet->setCellValue('A2', 'Gmail')->setCellValue('B2', $gmail);
    $sheet->setCellValue('A3', 'Phone Number')->setCellValue('B3', $phone);
    $sheet->setCellValue('A4', 'Address')->setCellValue('B4', $address);
    $sheet->setCellValue('A5', 'Department')->setCellValue('B5', $department);
    $sheet->setCellValue('A6', 'Year')->setCellValue('B6', $year);
    $sheet->setCellValue('A7', 'Roll No')->setCellValue('B7', $roll_no);
    $sheet->setCellValue('A8', 'Blood Group')->setCellValue('B8', $blood_group);

    // Add event data to the spreadsheet
    $rowIndex = 10;
    $sheet->setCellValue('A' . $rowIndex, 'Technical Events');
    $sheet->setCellValue('B' . $rowIndex, $technical_event1);
    $sheet->setCellValue('C' . $rowIndex, $technical_mark1);
    $rowIndex++;

    // Repeat for other events
    $sheet->setCellValue('A' . $rowIndex, 'Cultural Events');
    $sheet->setCellValue('B' . $rowIndex, $cultural_event1);
    $sheet->setCellValue('C' . $rowIndex, $cultural_mark1);
    $rowIndex++;

    $sheet->setCellValue('A' . $rowIndex, 'Academic Events');
    $sheet->setCellValue('B' . $rowIndex, $academic_event1);
        $sheet->setCellValue('C' . $rowIndex, $academic_mark1);
    $rowIndex++;

    $sheet->setCellValue('A' . $rowIndex, 'Sports/Social Events');
    $sheet->setCellValue('B' . $rowIndex, $sports_event1);
    $sheet->setCellValue('C' . $rowIndex, $sports_mark1);
    $rowIndex++;

    // Populate tables from the Word document in the spreadsheet
    foreach ($tables as $table) {
        foreach ($table as $row) {
            $colIndex = 'A';
            foreach ($row as $cell) {
                $sheet->setCellValue($colIndex . $rowIndex, $cell);
                $colIndex++;
            }
            $rowIndex++;
        }
        $rowIndex++; // Add a blank row between tables
    }

    // Generate a filename
    $filename = 'Student_Profile_' . $roll_no . '.xlsx';

    // Save the new spreadsheet in a temporary directory
    $tempDir = sys_get_temp_dir();
    $filePath = $tempDir . DIRECTORY_SEPARATOR . $filename;

    try {
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
    } catch (Exception $e) {
        die('Error saving spreadsheet: ' . $e->getMessage());
    }

    // Provide download link to use
    echo "Spreadsheet created successfully. <a href='download.php?file=$filename'>Download here</a>";
} else {
    echo "Form not submitted.";
}
?>

