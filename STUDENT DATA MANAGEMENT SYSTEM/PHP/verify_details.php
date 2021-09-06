<?php
include ('connecting_database.php');
session_start();
if(isset($_SESSION['user']))
{
    unset($_SESSION['user']);
}
else if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=$_POST['username'];
    $sql="select * from student where username=$username";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            $_SESSION['user']=$username;
            header('location:display_details.php');
        }
        else
        {
            echo "<script>alert('INVALID CREDENTIAL: USERNAME');</script>";
            echo "<script>window.location.href='administrator_menu.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('TECHNICAL ERROR');</script>";
        echo "<script>window.location.href='administrator_menu.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Student Details</title>
    <link rel="stylesheet" href="../CSS/style2.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>STUDENT DATA MANAGEMENT SYSTEM</h1>
        </header>
        <main>
            <div id="div1">
                <h2>VERIFY STUDENT EVENTS</h2>
                <form action="verify_details.php" method="POST" onsubmit="return validateFun2()">
                    <input type="text" name="username" id="username" placeholder="USERNAME" minlength="10" required>
                    <input type="submit" value="SUBMIT" id="button">
                </form>
            </div>
        </main>
        <footer>
            <p>RAHUL KUMAR JHA</p>
        </footer>
    </div>
    <script src="../JS/script.js"></script>
</body>
</html>