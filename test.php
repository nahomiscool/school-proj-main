<?php
    require_once 'config.php';

        echo "<!-- Session data: ";
        print_r($_SESSION);
        echo " -->";
    
    $ID = $_SESSION['user_id'] ?? 'Not available';
    $Name = $_SESSION['username'] ?? 'Guest';
    $Email = $_SESSION['user_email'] ?? 'Not available';
    $userFname = $_SESSION['user_fname'] ?? 'User';
    $userLname = $_SESSION['user_lname'] ?? '';
    $role = $_SESSION['user_role'] ?? 'Student';
    //--------------------------
    $user_depr = $_SESSION['departmentName'] ?? 'Not available';
    //---------------------------
    $year = $_SESSION['year'];
    $coursename = $_SESSION['courseName'];
    $ar =[$coursename];
    $semester = $_SESSION['semester'];
    for($i = 0; $i < count($ar); $i++){
        echo $ar[$i],"<br>";
    }

    // FIXED: Changed login.html to login.php
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    $fullName = $userFname . ' ' . $userLname;

?>