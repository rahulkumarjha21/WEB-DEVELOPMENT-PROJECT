<?php
include 'connecting_database.php';
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=$_SESSION['username2'];
    unset($_SESSION['username2']);
    $profilephoto=$_FILES['profilephoto']['name'];
    $tempname=$_FILES['profilephoto']['tmp_name'];
    $folder="../images/".$profilephoto;
    $name=$_POST['name'];
    $branch=$_POST['branch'];
    $semester=$_POST['semester'];
    $dateofbirth=$_POST['dateofbirth'];
    $email=$_POST['email'];
    $sql="";
    if($profilephoto=="")
    {
        $sql="UPDATE `student` SET `name` = '$name', `branch` = '$branch', `semester` = '$semester', `dateofbirth` = '$dateofbirth', `email` = '$email' WHERE `student`.`username` = '$username'";
    }
    else
    {
        if(move_uploaded_file($tempname, $folder))  
        {
            $sql="UPDATE `student` SET `profilephoto` = '$profilephoto', `name` = '$name', `branch` = '$branch', `semester` = '$semester', `dateofbirth` = '$dateofbirth', `email` = '$email' WHERE `student`.`username` = '$username'";
        }
        else
        {
            echo "<script>alert('TECHNICAL ERROR');</script>";
            echo "<script>window.location='administrator_menu.php';</script>";
        }
    }
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "<script>alert('UPDATION SUCESSFUL');</script>";
    }
    else
    {
        echo "<script>alert('UPDATION UNSUCESSFUL');</script>";
    }
    echo "<script>window.location='administrator_menu.php';</script>";
}
else if(isset($_SESSION['username2']))
{
    $username=$_SESSION['username2'];
    $sql="select * from student where username='$username'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            $row=mysqli_fetch_assoc($result);
        }
    }
    else
    {
        echo "<script>alert('TECHNICAL ERROR');</script>";
        echo "<script>window.location='administrator_menu.php';</script>";
    }
}
else
{
    echo "<script>window.location='administrator_menu.php';</script>";  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Details</title>
    <link rel="stylesheet" href="../CSS/style4.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>STUDENT DATA MANAGEMENT SYSTEM</h1>
        </header>
        <main>
            <div id="div1">
                <h2>UPDATE STUDENT DETAILS</h2>
                <form action="update_student_details.php" method="POST" onsubmit="return validateFun5()" enctype="multipart/form-data">
                    <input type="text" name="username" id="username" placeholder="USERNAME" value="<?php echo $row['username'] ?>"  disabled>
                    <div id="div2">
                        <label for="profilephoto" id="label1"><?php echo $row['profilephoto'] ?></label>
                        <input type="file" name="profilephoto" id="profilephoto" onchange="validateImage()" accept="image/*" value="<?php echo $row['profilephoto'] ?>">
                    </div>
                    <input type="text" name="name" id="name" placeholder="ENTER FULL NAME" value="<?php echo $row['name'] ?>" required>
                    <select name="branch" id="branch" required>
                        <option value="<?php echo $row['branch'] ?>" hidden selected><?php echo $row['branch'] ?></option>
                        <option value="" hidden>BRANCH</option>
                        <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                        <option value="Computer Science & Information Technology">Computer Science & Information Technology</option>
                        <option value="Electrical Engineering">Electrical Engineering</option>
                        <option value="Electrical & Electronics Engineering">Electrical and Electronics Engineering</option>
                        <option value="Electronics & Communication Engineering">Electronics & Communication Engineering</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                    </select>
                    <select name="semester" id="semester" required>
                        <option value="<?php echo $row['semester'] ?>" selected hidden><?php echo $row['semester'] ?></option>
                        <option value="" hidden>SEMESTER</option>
                        <option value="Semester 1">Semester 1</option>
                        <option value="Semester 2">Semester 2</option>
                        <option value="Semester 3">Semester 3</option>
                        <option value="Semester 4">Semester 4</option>
                        <option value="Semester 5">Semester 5</option>
                        <option value="Semester 6">Semester 6</option>
                        <option value="Semester 7">Semester 7</option>
                        <option value="Semester 8">Semester 8</option>
                    </select>
                    <input type="text" name="dateofbirth" id="dateofbirth" placeholder="ENTER YOUR DATE OF BIRTH" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $row['dateofbirth'] ?>" required>
                    <input type="email" name="email" id="email" placeholder="ENTER AN EMAIL ID" value="<?php echo $row['email'] ?>" required>
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