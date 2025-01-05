<?php
if (isset($_GET['file'])) {
    // Sanitize the file name to prevent directory traversal attacks
    $file = basename($_GET['file']);
    $filePath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $file;

    if (file_exists($filePath)) {
        // Set headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));

        // Clear output buffer and read the file
        flush(); // Flush system output buffer
        readfile($filePath);

        // Optionally delete the file after download
        // unlink($filePath);

        exit;
    } else {
        // File does not exist
        http_response_code(404);
        echo "File not found.";
    }
} else {
    // No file parameter provided
    http_response_code(400);
    echo "No file specified.";
}
?>
