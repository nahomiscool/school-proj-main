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

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['username'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    if ($name === '' || $pass === '') {
        $message = "Please enter username and password to login.";
    } else {
        
        $sql = "SELECT Userid FROM User WHERE userName = '$name' AND password = '$pass'";
        $result = mysqli_query($conn, $sql);
        
        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['Userid'];    
            mysqli_close($conn);
            header('Location: Home.php');
            exit;
        } else {
            $message = "Invalid username or password.";
            
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login-styles.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="post">
            <img src="./IMG/photo_2025-09-28_09-52-49-removebg-preview.png" alt="Logo" class="logo">
            <h1><span class="p1">UNITY</span> <span class="p2">UNIVERSITY</span></h1>
            <div style="color: red; text-align: center; margin-bottom: 15px;"><?php echo htmlspecialchars($message); ?></div>
            <div class="form-group">
                <img src="./IMG/working.png" alt="Username Icon"> 
                <label>USERNAME:</label>
                <input type="text" id="username-js" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <img src="./IMG/reset-password.png" alt="Password Icon"> 
                <label>PASSWORD:</label>
                <input type="password" id="password-js" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>
</html>