<?php
// Get the file name from the URL parameter
$filename = isset($_GET['file']) ? $_GET['file'] : '';

// Check if the file name is provided
if ($filename) {
    // Construct the full file path
    $tempDir = sys_get_temp_dir();
    $filePath = $tempDir . DIRECTORY_SEPARATOR . $filename;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set headers to force download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));

        // Read the file and output it to the browser
        readfile($filePath);

        // Optionally delete the file after download
        unlink($filePath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "File name not provided.";
}
?>
