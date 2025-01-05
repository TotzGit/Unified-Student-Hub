<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bethlehem Institute of Engineering</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="homecss.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>
    <header>
        <div class="logo">
            <img src="/images/bethlahem-logo.jpg" alt="Logo">
        </div>
        <button class="nav-toggle" aria-label="Toggle Navigation">
            <i class="fas fa-bars"></i>
        </button>
        <nav>
            <ul class="nav-menu">
                <li><a href="#"class="nav-link nav-link-ltr" >Home</a></li>
                <li><a href="#"class="nav-link nav-link-ltr">Student Portal</a></li>
                <li><a href="#"class="nav-link nav-link-ltr">Update Details</a></li>
                <li><a href="#"class="nav-link nav-link-ltr">Update Event Details</a></li>
                <li><a href="#"class="nav-link nav-link-ltr">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>BETHLAHEM INSTITUTE OF ENGINEERING</h1>
        <p>Welcome to the Student Management Portal of Bethlahem Institute of Engineering. This platform is designed to streamline student data management, enabling both students and faculty to easily update, access, and maintain accurate records. The portal ensures a seamless experience in managing academic and extracurricular activities while keeping data secure and well-organized. This web application enhances the efficiency of data handling and ensures the student records are up to date. easy access to student information, and a highly secure environment for storing data. The data management system is built to maintain the integrity of previously saved information, ensuring that updates do not erase historical records unless specifically instructed, a dynamic platform created to enhance the management of student data, ensuring smooth academic and extracurricular tracking throughout their academic journey. This portal represents Bethlahem Institute of Engineering's commitment to fostering a modern, efficient, and student-centric environment where technology aids in the holistic development of students. It allows easy collaboration between students and administrators to maintain updated, accurate records in both academic and extracurricular domains.</p>
    </main>

        <script>
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('nav ul');

    navToggle.addEventListener('click', () => {
        navMenu.classList.toggle('nav-menu-visible');
    });
</script>
</body>

</html>
