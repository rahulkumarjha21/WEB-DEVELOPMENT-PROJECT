<?php
include ('connection.php');
session_start();
if(isset($_SESSION['email'])) {
    $email=$_SESSION['email'];
    $sql="select * from guest where email='$email';";
    $result=mysqli_query($conn,$sql);
    if($result) {
        $num=mysqli_num_rows($result);
        if($num==1) {
            $row=mysqli_fetch_assoc($result);
        }
        else {
            echo "<script>alert('Technical Error');</script>";
            echo "<script>window.location.replace('join_us.php');</script>";
        }
    }
    else {
        echo "<script>alert('Technical Error');</script>";
        echo "<script>window.location.replace('join_us.php');</script>";
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
    <title>My Profile</title>
    <link rel="stylesheet" href="../css/style4.css">
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
                <div id="div12">
                    <a href="logout.php"> &nbsp; &nbsp; Log Out &nbsp; &nbsp; </a>
                </div>
                <div id="div1">
                    <img src="../images/img5.png" alt="Profile Pic">
                </div>
                <div id="div0">
                    <div id="div2">
                        <img src="../images/img1.png" alt="Email">
                        <input type="email" name="email" id="email" value=" <?php echo $row['email']; ?> " readonly>
                    </div>
                    <div id="div3">
                        <img src="../images/img3.png" alt="Name">
                        <input type="name" name="name" id="name" value=" <?php echo $row['name']; ?> " readonly>
                    </div>
                    <div id="div4">
                        <img src="../images/img4.png" alt="Phone">
                        <input type="tel" name="tel" id="tel" value=" <?php echo $row['phone']; ?> " readonly>
                    </div>
                    <div id="div11">
                        <a href="reset_password.php" id="button">Change Password</a>
                    </div>
                    <div id="div13">
                        <a href="add_question.php" id="button2">Add Question</a>
                    </div>
                </div>
                <?php
                $sql="select * from question where email='$email';";
                $result=mysqli_query($conn,$sql);
                if($result) {
                    $result=mysqli_query($conn,$sql);
                    $num=mysqli_num_rows($result);
                }
                else {
                    echo "<script>window.location.replace('join_us.php');</script>";
                }
                ?>
                <div id="div5">
                    <h2>Added Question</h2>
                </div>
                <?php
                if($num>0) {
                ?>
                    <?php
                    while($row=mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="div6">
                            <div class="div7"><a href=""> <?php echo $row['email'] ?> </a></div>
                            <div class="div8"> <?php echo $row['question'] ?> </div>
                            <div class="div9"> <?php echo $row['date'] ?> </div>
                            <div class="div10">
                                <a href="answer.php?id=<?php echo$row['id']?>&email=<?php echo$row['email']?>">Answers</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                <?php
                }
                else {
                ?>
                        <div class="div6">
                            <div class="div7"><a href="">Not Specified</a></div>
                            <div class="div8"></div>
                            <div class="div9"></div>
                            <div class="div10">
                                <a href=""> No File Attached</a>
                            </div>
                        </div>
                <?php
                }
                ?>
            </div>
        </main>
        <footer>
            &copy; Designed by: Rahul Kumar Jha
        </footer>
    </div>
</body>
</html>