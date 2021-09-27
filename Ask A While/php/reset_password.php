<?php
include ('connection.php');
session_start();
if(isset($_SESSION['email'])) {
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $email=$_SESSION['email'];
        $password=$_POST['password1'];
        $sql="UPDATE `guest` SET `password` = '$password' WHERE `guest`.`email` = '$email';";
        $result=mysqli_query($conn,$sql);
        if($result) {
            echo "<script> alert('Updation Sucessful'); </script>";
        }
        else {
            echo "<script>alert('Technical Error');</script>";
        }
        echo "<script>window.location.replace('my_profile.php');</script>";
    }
}
else {
    echo "<script> window.location.href='join_us.php' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Ask A While</h1>
        </header>
        <nav>
            <a href="../index.php">Home</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="join_us.php">Join Us</a>
            <a href="my_profile.php">My Profile</a>
        </nav>
        <main>
            <div id="content">
                <div id="div1">
                    <h2 style="font-size: 22.25px;">Reset Password</h2>
                </div>
                <form id="form2" style="display: block;" onsubmit="return resetPassword()" action="reset_password.php" method="POST">
                    <div id="div6">
                        <img src="../images/img2.png" alt="Password">
                        <input type="password" name="password1" id="password1" placeholder="New Password" required minlength="5" >
                    </div>
                    <div id="div9">
                        <img src="../images/img2.png" alt="Password">
                        <input type="password" name="password2" id="password2" placeholder="Confirm Password" required minlength="5">
                    </div>
                    <div id="div10">
                        <div id="div61"></div>
                        <input type="submit" value="Submit" id="submit2">
                    </div>
                </form>
            </div>
        </main>
        <footer>
            &copy; Designed by: Rahul Kumar Jha
        </footer>
    </div>
    <script src="../js/script.js" type="text/javascript"></script>
</body>
</html>