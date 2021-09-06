<?php
include 'connecting_database.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=$_POST['username'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $sql="UPDATE `administrator` SET `password` = '$password' WHERE `administrator`.`username` = '$username'";
    $result=mysqli_query($conn,$sql);
    $aff=mysqli_affected_rows($conn);
    if($aff==1)
    {
        echo "<script>alert(\"UPDATION SUCESSFUL\")</script>";
    }
    else
    {
        echo "<script>alert('UPDATION UNSUCESSFUL: INVALID CREDENTIAL USERNAME OR FULL NAME');</script>";
    }
    echo "<script>window.location.href='administrator_login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Administrator Password</title>
    <link rel="stylesheet" href="../CSS/style2.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>STUDENT DATA MANAGEMENT SYSTEM</h1>
        </header>
        <main>
            <div id="div1">
                <h2>RESET ADMINISTRATOR PASSWORD</h2>
                <form action="reset_administrator_password.php" method="POST" onsubmit="return validateFun4()">
                    <input type="text" name="username" id="username" placeholder="USERNAME" minlength="10" required>
                    <input type="text" name="name" id="name" placeholder="FULL NAME" required>
                    <input type="password" name="password" id="password" placeholder="NEW PASSWORD" minlength="5" required>
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