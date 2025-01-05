<!DOCTYPE html>
<html>
<head>
    <title>Download Success</title>
    <style>
	    body {
        background-image: url('fotor-ai-20240814235257.jpg'); /* Make sure to update the paths to your images */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center 1px; /* Center both images */
        font-family: Arial, sans-serif;
        }
		body {
    position: relative;
    font-family: Arial, sans-serif;
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
    opacity: 0.5; /* Adjust background image opacity */
    z-index: -1; /* Keep the overlay behind the content */
}
    </style>
</head>
<body>
    <h1>Spreadsheet created successfully.</h1>
    <p>Click <a href="download.php?file=<?php echo $_GET['file']; ?>">here</a> to download the file.</p>
</body>
</html>