<?php
include 'connecting_database.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=$_POST['username'];
    $sql="DELETE FROM `student` WHERE `student`.`username` = $username";
    $result=mysqli_query($conn,$sql);
    $aff=mysqli_affected_rows($conn);
    if($aff==1)
    {
        echo "<script>alert('DELETION SUCESS')</script>";
    }
    else
    {
        echo "<script>alert('DELETION UNSUCESSFUL: INVALID CREDENTIAL');</script>";
    }
    echo "<script>window.location.href='administrator_menu.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Details</title>
    <link rel="stylesheet" href="../CSS/style2.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>STUDENT DATA MANAGEMENT SYSTEM</h1>
        </header>
        <main>
            <div id="div1">
                <h2>DELETE STUDENT DETAILS</h2>
                <form action="delete_student_details.php" method="POST" onsubmit="return validateFun2()">
                    <input type="text" name="username" id="username" placeholder="USERNAME" minlength="10" required>
                    <input type="submit" value="SUBMIT" id="button">
                </form>
            </div>
        </main>
        <footer>
            <p>RAHUL KUMAR JHA</p>
        </footer>
    </div>
    <script src="../JAVASCRIPT/script.js"></script>
</body>
</html>