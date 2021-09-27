<?php
include 'connection.php';
if($_SERVER['REQUEST_METHOD']=='POST') {
    if(isset($_POST['submit'])) {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="select * from guest where email='$email' and password='$password';";
        $result=mysqli_query($conn,$sql);
        if($result) {
            $num=mysqli_num_rows($result);
            if($num==1) {
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                header("location:my_profile.php");
            }
            else {
                echo "<script>alert('Invalid Credential');</script>";
            }
        }
        else {
            echo "<script>alert('Technical Error');</script>";
        }
    }
    else {
        $email=$_POST['email2'];
        $name=$_POST['name2'];
        $tel=$_POST['tel'];
        $password=$_POST['password2'];
        $sql="select * from guest where email='$email';";
        $result=mysqli_query($conn,$sql);
        if($result) {
            $num=mysqli_num_rows($result);
            if($num==0) {
                $sql="INSERT INTO `guest` (`email`, `name`, `phone`, `password`, `otp`) VALUES ('$email', '$name', '$tel', '$password', '000000');";
                $result=mysqli_query($conn,$sql);
                if($result) {
                    echo "<script>alert('Registrartion Successful');</script>";
                }
                else {
                    echo "<script>alert('Registration Failed: Technical Error');</script>";
                }
            }
            else {
                echo "<script>alert('Registration Failed: Email Id Already Registered');</script>";
            }
        }
        else {
            echo "<script>alert('Technical Error');</script>";
        }
    }
    echo "<script>window.location.replace('join_us.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us</title>
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
                    <h2 onclick="button1()" style="text-decoration: underline;" id="opt1">Log In</h2>
                    <h2 style="border-left: 2px solid silver;" onclick="button2()" id="opt2">Sign Up</h2>
                </div>
                <form id="form1" onsubmit="return verify1()" action="join_us.php" method="POST">
                    <div id="div2">
                        <img src="../images/img1.png" alt="">
                        <input type="email" name="email" id="email" placeholder="Email Id" required>
                    </div>
                    <div id="div3">
                        <img src="../images/img2.png" alt="">
                        <input type="password" name="password" id="password" placeholder="Password"required minlength="5">
                    </div>
                    <div id="div4">
                        <div id="div41"></div>
                        <input type="submit" value="Log In" id="submit" name="submit">
                    </div>
                    <div id="div5">
                        <div id="div51"></div>
                        <a href="../php/forgot_password.php">Forgot Password</a>
                    </div>
                </form>
                <form id="form2" onsubmit="return verify2()" action="join_us.php" method="POST">
                    <div id="div6">
                        <img src="../images/img1.png" alt="">
                        <input type="email" name="email2" id="email2" placeholder="Email Id" required>
                    </div>
                    <div id="div7">
                        <img src="../images/img3.png" alt="">
                        <input type="text" name="name2" id="name2" placeholder="Full Name" required minlength="1">
                    </div>
                    <div id="div8">
                        <img src="../images/img4.png" alt="">
                        <input type="tel" name="tel" id="tel" placeholder="Mobile Number" required minlength="10" maxlength="10">
                    </div>
                    <div id="div9">
                        <img src="../images/img2.png" alt="">
                        <input type="password" name="password2" id="password2" placeholder="Password" required minlength="5">
                    </div>
                    <div id="div10">
                        <div id="div61"></div>
                        <input type="submit" value="Sign Up" id="submit2">
                    </div>
                </form>
            </div>
        </main>
        <footer>
            &copy; Designed By: Rahul Kumar Jha
        </footer>
    </div>
    <script src="../js/script.js" type="text/javascript"></script>
</body>
</html>