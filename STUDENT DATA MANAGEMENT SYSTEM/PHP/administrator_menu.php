<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION!=true)
{
    header("location:administrator_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Menu</title>
    <link rel="stylesheet" href="../CSS/style3.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>STUDENT DATA MANAGEMENT SYSTEM</h1>
        </header>
        <main>
            <div id="div1">
                <h2>ADMINISTRATOR MENU</h2>
                <a href="logout.php" id="link1">LOGOUT</a>
                <a href="add_student_details.php">ADD STUDENT DETAILS</a>
                <a href="verify_student_details.php">UPDATE STUDENT DETAILS</a>
                <a href="verify_details.php">READ STUDENT DETAILS</a>
                <a href="delete_student_details.php">DELETE STUDENT DETAILS</a>
                <a href="view_administrator_database.php">VIEW ADMINISTRATOR DATABASE</a>
                <a href="view_student_databse.php">VIEW STUDENT DATABASE</a>
            </div>
        </main>
        <footer>
            <p>RAHUL KUMAR JHA</p>
        </footer>
    </div>
</body>
</html>