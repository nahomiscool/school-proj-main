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
    if (!$user_id) return; // Add this check
    
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
    }
}    

function studentInformation($conn, $user_id) {
    if (!$user_id) return; // Add this check
    
    // Remove the userInformation call from here (causing duplicate)
    $sql2 = "SELECT UserID, studID, department, grade FROM studentInfo WHERE UserID = '$user_id'";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2 && mysqli_num_rows($result2) === 1) {
        $row2 = mysqli_fetch_assoc($result2);
        $_SESSION['studID'] = $row2['studID'];
        $_SESSION['department'] = $row2['department'];
        $_SESSION['grade'] = $row2['grade'];
        return $_SESSION['department'];
    }else{
            error_log("No studentInfo record found for user_id: $user_id");
    }
     
}





function departmentInformation($conn, $user_dep){
    if (!$user_dep) return; // Add this check
    
    $sql3 = "SELECT depID, depName FROM department WHERE depID = '$user_dep'";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3 && mysqli_num_rows($result3) === 1) {
        $row3 = mysqli_fetch_assoc($result3);
        $_SESSION['departmentName'] = $row3['depName'];
    }
} 




if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    userInformation($conn, $user_id);
    $user_dep = studentInformation($conn, $user_id);
    departmentInformation($conn, $user_dep);
}

?>