<?php
include 'connecting_database.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_POST['name'];
    $password=$_POST['password'];
    $sql="INSERT INTO `administrator` (`username`, `name`, `password`) VALUES (NULL, '$name', '$password')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $id=mysqli_insert_id($conn);
        echo "<script>alert(\"INSERTATION SUCESSFUL, \\nGENERATED USERNAME: \"+'$id');</script>";
    }
    else
    {
        echo "<script>alert('INSERTATION FAILED: TECHNICAL ERROR');</script>";
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
    <title>Add Administrator Details</title>
    <link rel="stylesheet" href="../CSS/style2.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>STUDENT DATA MANAGEMENT SYSTEM</h1>
        </header>
        <main>
            <div id="div1">
                <h2>ADD ADMINISTRATOR DETAILS</h2>
                <form action="add_administrator_details.php" method="POST" onsubmit="return validateFun3()">
                    <input type="text" name="name" id="name" placeholder="FULL NAME" required>
                    <input type="password" name="password" id="password" placeholder="PASSWORD" minlength="5" required>
                    <input type="submit" value="REGISTER" id="button">
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