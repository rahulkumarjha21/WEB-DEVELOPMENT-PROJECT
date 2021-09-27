<?php
include 'connection.php';
if($_SERVER['REQUEST_METHOD']=='POST') {
    $email=$_POST['email'];
    $query="Password Reset";
    $sql="INSERT INTO `admin_query` (`email`, `query`) VALUES ('$email', '$query');";
    $result=mysqli_query($conn,$sql);
        if($result) {
            echo "<script>alert('Request Submit Sucessfully');</script>";
        }
        else {
            echo "<script>alert('Technical Error');</script>";
        }
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
            <a href="../php/join_us.php">Join Us</a>
            <a href="my_profile.php">My Profile</a>
        </nav>
        <main>
            <div id="content">
                <div id="div1">
                    <h2>Forgot Password</h2>
                </div>
                <form id="form2" style="display: block;" action="forgot_password.php" method="POST">
                    <div id="div6">
                        <img src="../images/img1.png" alt="">
                        <input type="email" name="email" id="email2" placeholder="Email Id" required>
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