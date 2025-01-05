<?php
$filename = 'student_profiles.csv';  // Change the file name here
$file_exists = file_exists($filename);
$students = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
	$address = $_POST['address'];
	$year = $_POST['year'];

    // Basic email validation
    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($phone)) {
        // Create an array with student details
        $studentDetails = [
            'Name' => $name,
            'Email' => $email,
            'Phone' => $phone,
            'Department' => $department,
			'address' => $address,
			'year' => $year,
        ];

        $students[] = $studentDetails;

        // Save student details to an Excel file (CSV format)
        $file = fopen($filename, 'a'); // Open file in append mode
        if (!$file_exists) {
            // Write header only if the file doesn't exist
            fputcsv($file, array_keys($studentDetails));
        }
        fputcsv($file, $studentDetails); // Write student details
        fclose($file);

        // Set headers for download
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        readfile($filename); // Output file content
        exit;
    } else {
        echo 'Please fill in all the fields with valid data.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Profile Card</title>
</head>
<body>
    <h2>STUDENTS PROFILE CARD</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <label for="department">Department:</label>
        <input type="text" name="department" required><br>
		
		 <label for="address">address:</label>
        <input type="text" name="address" required><br>
		
		<label for="Year">year:</label>
        <input type="number_format" name="year" required><br>


        <input type="submit" value="Submit">
    </form>
</body>
</html>
