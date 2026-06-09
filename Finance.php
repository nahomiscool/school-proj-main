<?php
    require_once 'config.php';
    $ID = $_SESSION['user_id'] ?? 'Not available';
    $Name = $_SESSION['username'] ?? 'Guest';
    $Email = $_SESSION['user_email'] ?? 'Not available';
    $userFname = $_SESSION['user_fname'] ?? 'User';
    $userLname = $_SESSION['user_lname'] ?? '';
    $role = $_SESSION['user_role'] ?? 'Student';
    $grades = $_SESSION['grades'] ?? [];
    // FIXED: Changed login.html to login.php
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    $fullName = $userFname . ' ' . $userLname;
    $TC = 0;    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/Styles.css">
    <link rel="stylesheet" href="./css/Finance.css">
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
                    <a href="./Home.php"><button>Home</button></a>
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
                    <p></p>
                    <a href="./logout.php" ><button>Signout</button></a>
                </div>
            </div>
        </div>
    </nav>
    <section class="section">
        <div class="studInfo">
            <h3>Student Information</h3>
            <ul>
                <li>
                    <p>Full Name: </p>
                    <span><?php echo htmlspecialchars($fullName); ?>  </span>
                </li>
                <li>
                    <p>ID: </p>
                    <span><?php echo htmlspecialchars($ID); ?></span>
                </li>
                <li>
                    <p>Department: </p>
                    <span><?php echo htmlspecialchars($_SESSION['departmentName'] ?? '-'); ?></span>
                </li>
                <li>
                    <p>Total Balance Due: </p>
                    <span><?php echo "$",htmlspecialchars($_SESSION['totalBalance']); ?></span>
                </li>
                <li>
                    <p>Next pay: </p>
                    <span>2-12-2025</span>
                </li>
            </ul>
        </div>
            
        <div class="overView">
            <h3>Registered Courses Overview</h3>
            <table style = "width: 100%">
                <?php
                   echo "<tr>";
                        echo "<th>Course Title</th>";
                        echo "<th>Course No</th>";
                        echo "<th>Cr</th>";
                        echo "<th>Lab hr</th>";
                    echo "</tr>";

                    foreach ($grades as $grades) {
                        $TC +=  $grades['creditHours'];
                        $_SESSION['$TC'] = $TC;
                        echo "<tr>";
                            echo "<td bgcolor=\"#e0e0e0\" >", htmlspecialchars($grades['title'] ?? 'N/A'),"</td>";
                            echo "<td bgcolor=\"#e0e0e0\" >", htmlspecialchars($grades['courseID'] ?? 'N/A'),"</td>";
                            echo "<td bgcolor=\"#e0e0e0\" >", htmlspecialchars($grades['creditHours'] ?? 'N/A'),"</td>";
                            echo "<td bgcolor=\"#e0e0e0\" >2</td>";
                        echo "</tr>";
                    }

                   
                    echo "<tr>";
                        echo "<th colspan=\"1\" style=\"text-align: right;border-top: 4px solid #0022b8\" >Total:</th>";
                        echo "<th colspan=\"1\" style=\"border-top: 4px solid #0022b8;\" ></th>";
                        echo "<th colspan=\"1\" style=\"text-align: left;border-top: 4px solid #0022b8;color: rgb(146, 7, 3);\" >", htmlspecialchars($TC), "</th>";
                        echo "<th colspan=\"1\" style=\"text-align: left;border-top: 4px solid #0022b8; color: rgb(146, 7, 3);\">10</th>";
                    echo "</tr>";
                ?>



            </table>
        </div>
        <div class="finance-breakdown">
            <h3>Fee Breakdown</h3>
            <ul>
                <li>
                    <span>Tuition (<?php echo htmlspecialchars($TC); ?> Cr x $350)</span>
                    <strong><?php echo "$",htmlspecialchars($TC) * 350; ?></strong>
                </li>
                <li>
                    <span>Lab Fees (10 Hrs x $100)</span>
                    <strong>$1,000</strong>
                </li>
                <li>
                    <span>Registration Fee</span>
                    <strong>$500</strong>
                </li>
                <li class="total-row">
                    <span>Total Balance</span>
                    <strong><?php echo "$",htmlspecialchars($_SESSION['totalBalance']);  ?></strong>
                </li>
            </ul>
        </div>
        <div class="pay">
            <p class="meta-data" >TOTAL BALANCE DUE</p>
            <h1><?php echo "$",htmlspecialchars($_SESSION['totalBalance']); ?></h1>
            <ul>
                <li>
                    <P>Next Payment Due</P>
                    <span>2025-02-12</span>
                </li>
                <li>
                    <p>payment status</p>
                    <span class="sp2">PENDING</span>
                </li>
                
            </ul>
            
            <button>Make payment Now</button>
        </div>
    </section>
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
    <script type="module" src="./JS/data.js" ></script>
</body>
</html>