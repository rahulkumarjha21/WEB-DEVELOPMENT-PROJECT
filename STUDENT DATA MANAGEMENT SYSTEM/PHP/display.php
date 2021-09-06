<?php
include ('connecting_database.php');
session_start();
if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
    $sql="select * from student where username='$username'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            $row=mysqli_fetch_assoc($result);
        }
        else
        {
            echo "<script> alert('INVALID CREDENTAIL NO RECORD FOUND'); </script>";
            echo "<script> window.location.href='student_login.php' </script>";
        }
    }
    else
    {
        echo "<script> alert('TECHINAL ERROR NO RECORD FOUND'); </script>";
        echo "<script> window.location.href='student_login.php' </script>";
    }
}
else
{
    echo "<script> window.location.href='student_login.php' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Student Details</title>
    <link rel="stylesheet" href="../CSS/style2.css">
    <style>
        #profilephoto
        {
            width: 150px;
            height: 125px;
        }
        input
        {
            padding: 0;
            font-weight:normal;
            font-size:13px;
        }
    </style>
</head>
<body>
    <div id="container">
        <header>
            <h1>STUDENT DATA MANAGEMENT SYSTEM</h1>
        </header>
        <main>
            <div id="div1">
                <h2>DISPLAY STUDENT DETAILS</h2>
                <form action="">
                    <div id="profilephoto">
                        <img src="../images/<?php echo $row['profilephoto'] ?>" alt="" srcset="" width="150px" height="125px">
                    </div>
                    <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>">
                    <input type="text" name="branch" id="branch" value="<?php echo $row['branch'] ?>">
                    <input type="text" name="semester" id="semester" value="<?php echo $row['semester'] ?>">
                    <input type="text" name="dateofbirth" id="dateofbirth" value="<?php echo $row['dateofbirth'] ?>">
                    <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>">
                </form>
            </div>
        </main>
        <footer>
            <p>RAHUL KUMAR JHA</p>
        </footer>
    </div>
</body>
</html>