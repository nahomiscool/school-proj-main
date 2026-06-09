<?php
session_start();
$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'schoolPortal';

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if (!$conn) {
    http_response_code(500);
    die('Connection failed: ' . mysqli_connect_error());
}

function userInformation($conn, $user_id) {
    if (!$user_id) return false;
    
    $sql = "SELECT Userid, userName, email, userFname, userLname, role FROM User WHERE Userid = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['Userid'];
        $_SESSION['username'] = $row['userName'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_fname'] = $row['userFname'];
        $_SESSION['user_lname'] = $row['userLname'];
        $_SESSION['user_role'] = $row['role'];
        return true;
    }
    return false;
}    

function studentInformation($conn, $user_id) {
    if (!$user_id) return false;
    
    $sql2 = "SELECT UserID, studID, department, year,semester, grade FROM studentInfo WHERE UserID = '$user_id'";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2 && mysqli_num_rows($result2) === 1) {
        $row2 = mysqli_fetch_assoc($result2);
        $_SESSION['studID'] = $row2['studID'];
        $_SESSION['department'] = $row2['department'];
        $_SESSION['grade'] = $row2['grade'];
        $_SESSION['year'] = $row2['year'];
        $_SESSION['semester'] = $row2['semester'];
        return true;
    }
    return false;
}

function departmentInformation($conn, $user_dep){
    if (!$user_dep) return false;
    
    $sql3 = "SELECT depID, depName FROM department WHERE depID = '$user_dep'";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3 && mysqli_num_rows($result3) === 1) {
        $row3 = mysqli_fetch_assoc($result3);
        $_SESSION['departmentName'] = $row3['depName'];
        $_SESSION['depID'] = $row3['depID'];
        return true;
    }
    return false;
} 

function studentGrade($conn, $stud_id){
    if (!$stud_id) return false;
        $sql = "SELECT c.title, c.creditHours, g.Score, g.courseID, g.gradeID 
            FROM grade g, course c 
            WHERE g.courseID = c.CourseID 
            AND g.studID = '$stud_id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) >= 1) {
        $grades = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $grades[] = $row;
        }
        $_SESSION['grades'] = $grades;

        return true;
    }
    return false;
}
function GPA(){
    $res = 0;
    $i=0;
    $mark;
    $grades = $_SESSION['grades'] ?? [];

    foreach($grades as $grade) {

        if( $grade['Score']< 40){
            $mark = 0;
        }else if($grade['Score'] >= 85 && $grade['Score'] <= 100){
                $mark = 4;
        }else if($grade['Score'] >= 80 && $grade['Score'] < 85){
            $mark = 3.75;
        }else if($grade['Score'] >= 75 && $grade['Score'] < 80){
            $mark = 3.5;
        }else if($grade['Score'] >= 70 && $grade['Score'] < 75){
            $mark = 3.0;
        }else if($grade['Score'] >= 65 && $grade['Score'] < 70){
            $mark = 2.75;
        }else if($grade['Score'] >= 60 && $grade['Score'] < 65){
            $mark = 2.5;
        }else if($grade['Score'] >= 55 && $grade['Score'] < 60){
            $mark = 2.0;
        }else if($grade['Score'] >= 50 && $grade['Score'] < 55){
            $mark = 1.75;
        }else if($grade['Score'] >= 45 && $grade['Score'] < 50){
            $mark = 1.5;
        }else if($grade['Score'] >= 40 && $grade['Score'] < 45){
            $mark = 1.0;
        }else{
            $mark = 0;
        }

        $res += ($mark * $grade['creditHours']); 
        $i += $grade['creditHours'];
        
    }
    $_SESSION['TC'] = $i;
    $_SESSION['GPA'] = $res/$i;

}


function fee(){
    $_SESSION['totalBalance'] = $_SESSION['TC']*350 + 1000 + 500;
}




// Load all user data if logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    userInformation($conn, $user_id);
    studentInformation($conn, $user_id);
    
    if (isset($_SESSION['department']) && $_SESSION['department']) {
        departmentInformation($conn, $_SESSION['department']);
    }
    
    if (isset($_SESSION['studID']) && $_SESSION['studID']) {
        studentGrade($conn, $_SESSION['studID']);
        GPA();
        fee();
        
    }
}
?>