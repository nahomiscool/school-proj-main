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
    $semester = $_SESSION['semester'];
    

    // FIXED: Changed login.html to login.php
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    $fullName = $userFname . ' ' . $userLname;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/Styles.css">
    <link rel="stylesheet" href="./css/Home.css">
</head>
<body>
    
    <nav>
        <div class="innerNav">
            <div class="logo-nav-name">
                <img class="logo" src="./IMG/photo_2025-09-28_09-52-49-removebg-preview.png">
                <h1>UNITY</h1>
            </div>
            <div class="nav-section">
                <ul>
                    <a href="./Home.php" ><button>Home</button></a>
                    <a href="./Regstration.php" ><button>Registration</button></a> 
                    <a href="./Teachers.php"><button>Teachers</button></a>
                    <a href="./Finance.php" ><button>Finance</button></a>
                    <a href="./Grade.php"><button>Grade</button></a> 
                </ul>
            </div>
            <div class="profile" >
                <div>
                    <p style=" font-size:15px ; font-weight: bold;text-align: right;"> <?php echo htmlspecialchars($fullName); ?> </p> 
                    <p style="font-size: 12px; text-align: right; color: blue; font-weight: bold;" >ID: <?php echo htmlspecialchars($ID); ?> </p>
                </div>
                <img class="profile-img" src="./IMG/man.png">
                <div class="dropdown" >
                    <!-- FIXED: Changed to logout.php -->
                    <a href="logout.php"><button>Signout</button></a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="overView">
            <h1>Overview Dashboard</h1>
            <p>Welcome back, <?php echo htmlspecialchars($fullName); ?>! Here's what's happening today.</p>
        </div>
        <div class="main-bord">
            <div class="section-grid" > 
                <div class="Overview-panal" >
                    <div class="div1" >
                        <img src="./IMG/graduation-hat.png">
                    </div>
                    <div class="div2" >
                        <h5>ACADEMIC YEAR 2024/25</h5>
                        <p> <?php echo htmlspecialchars($user_depr); ?> Department</p>
                    </div>
                </div>
                <div class="Overview-panal2">
                    <div>
                        <p>🚀 Year</p>
                        <h3>Year  <?php echo htmlspecialchars($year); ?></h3>
                    </div>
                    <div>
                        <p>📅 SEMESTER</p>
                        <h3><?php echo htmlspecialchars($semester); ?></h3>
                    </div>
                    <div>
                        <p>⭐ CGPA</p>
                        <h3>3.4</h3>
                    </div>
                    <div>
                        <p>📝 CREDITS</p>
                        <h3>19</h3>
                    </div>
                </div>
                <div class="buttons-in-grid" >
                    <a href="./Grade.html" ><button class="btn1">View Academic Record</button></a>
                    <button class="btn2">Download ID Card</button>
                </div>  
            </div>

            <div class="finance-card">
                <div class="finance-top">
                    <div class="finance-icon">💰</div>
                    <span class="finance-title">Finance</span>
                </div>
                <p class="finance-label">Balance Due</p>
                <p class="finance-amount">$8,150</p>
                <p class="finance-date">Next due: <span>2025-02-12</span></p>
                <a href="./Finance.html" ><button class="finance-btn">Pay Fees</button></a>
            </div>
        </div>

        <div class="Event">
            <div class="Scadual">
                <h3>Today's Classes</h3>
                <div class="schedule-item">
                    <span class="time">08:00 AM</span>
                    <p class="subject">Data Structures</p>
                    <p class="room">Room A12</p>
                </div>
                <div class="schedule-item">
                    <span class="time">10:00 AM</span>
                    <p class="subject">Operating Systems</p>
                    <p class="room">Room B07</p>
                </div>
            </div>

            <div class="Assignment">
                <h3>📝 Assignments</h3>
                <div class="assignment-item">
                    <p class="subject">Web Programming</p>
                    <span class="due">Due: Feb 10</span>
                </div>
                <div class="assignment-item">
                    <p class="subject">Database Systems</p>
                    <span class="due">Due: Feb 14</span>
                </div>
            </div>

            <div class="Performance">
                <h3>📈 Attendance</h3>
                <div class="Performance-grid">
                    <div class="progress-circle">
                        <span>89%</span>
                    </div>
                    <h3>Attendance</h3>
                    <p>Attendance is above average</p>
                </div>
            </div>

            <div class="News">
                <h3>Latest News</h3>
                <div class="news-item">
                    <h2>📢</h2>
                    <div>
                        <p>End of semester exams start next week</p>
                        <span>2 hours ago</span>
                    </div>
                </div>
                <div class="news-item">
                    <h2>📢</h2>
                    <div> 
                        <p>Course registration deadline extended</p>
                        <span>Yesterday</span>
                    </div>
                    <!-- FIXED: Added missing closing div tag -->
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-box school">
                <h3>Unity University</h3>
                <p>Knowledge is Power</p>
                <p>Adama, Ethiopia</p>
            </div>
            <div class="footer-box">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Admissions</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-box">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Student Portal</a></li>
                    <li><a href="#">Academic Calendar</a></li>
                    <li><a href="#">Library</a></li>
                    <li><a href="#">Exams</a></li>
                </ul>
            </div>
            <div class="footer-box contact">
                <h4>Contact Us</h4>
                <p>📞 +251 994367798</p>
                <p>✉️ school@unity.edu.et</p>
                <div class="socials">
                    <a href="https://www.facebook.com/" target="_blank">FB</a>
                    <a href="https://www.telegram.com/" target="_blank">TG</a>
                    <a href="https://www.youtube.com/" target="_blank">YT</a>
                </div>
            </div>
            <div class="footer-bottom">
                © 2026 UNITY UNIVERSITY | All Rights Reserved
            </div>
        </div>
    </footer>

    <script type="module" src="./JS/Home_page.js"></script>
    <script type="module" src="./JS/data.js"></script>
</body>
</html>