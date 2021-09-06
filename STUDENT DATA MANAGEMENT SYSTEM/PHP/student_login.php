<?php
include ('connecting_database.php');
session_start();
session_destroy();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=$_POST['username'];
    $dateofbirth=$_POST['dateofbirth'];
    $sql="select * from student where username='$username' and dateofbirth= '$dateofbirth'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            header("location:display.php");
        }
        else
        {
            echo "<script>alert('INVALID CREDENTIAL: USERNAME OR PASSWORD');</script>";
        }
    }
    else
    {
        echo "<script>alert('TECHNICAL ERROR: SERVER DOWN');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="../CSS/style6.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>STUDENT DATA MANAGEMENT SYSTEM</h1>
        </header>
        <main>
            <div id="div1">
                <nav>
                    <a href="../HTML/index.html" id=child><h3>HOME</h3></a>
                    <a href="administrator_login.php" id=child><h3>ADMINISTRATOR</h3></a>
                    <a href="student_login.php" id=child><h3>STUDENT</h3></a>
                </nav>
                <h2>STUDENT LOGIN</h2>
                <form action="student_login.php" method="POST" onsubmit="return validateFun2()">
                    <input type="text" name="username" id="username" placeholder="USERNAME" minlength="10" required>
                    <input type="date" name="dateofbirth" id="dateofbirth">
                    <input type="submit" value="LOGIN" id="button">
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