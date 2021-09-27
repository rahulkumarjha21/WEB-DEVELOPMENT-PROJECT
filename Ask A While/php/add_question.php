<?php
include 'connection.php';
session_start();
if(isset($_SESSION['email'])) {
    $email=$_SESSION['email'];
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $question=$_POST['question'];
        $document=$_FILES['file']['name'];
        $tempname=$_FILES['file']['tmp_name'];
        $sql="select * from question;";
        $result=mysqli_query($conn,$sql);
        if($result) {
            $num=mysqli_num_rows($result);
            $num=$num+1;
            if($document!='') {
                $document=$num.$document;
            }
            $folder="../document/".$document;
            move_uploaded_file($tempname, $folder);
            date_default_timezone_set('Asia/Kolkata');
            $date=date('Y/m/d');
            $sql="INSERT INTO `question` (`email`, `id`, `question`, `document`, `answer`, `date`) VALUES ('$email', NULL, '$question', '$document', '0', '$date');";
            $result=mysqli_query($conn,$sql);
            if($result) {
                echo "<script>alert('Successful Question Posted');</script>";
                echo "<script>window.location.replace('my_profile.php');</script>";
            }
            else {
                echo "<script>alert('Unsucessful Technical Error');</script>";
                echo "<script>window.location.replace('my_profile.php');</script>";
            }
        }
        else {
            echo "<script>alert('Technical Error: File Updation Failed');</script>";
            echo "<script>window.location.replace('my_profile.php');</script>";
        }
    }
}
else {
    echo "<script>window.location.replace('my_profile.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    <link rel="stylesheet" href="../css/style2.css">
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
                    <h2>Add Question</h2>
                </div>
                <form action="add_question.php" method="POST" onsubmit="return verify4()" enctype="multipart/form-data">
                    <textarea name="question" id="question" placeholder="Add Your Question..." required></textarea>
                    <label for="file" id="label1">Attach File</label>
                    <input type="file" name="file" id="file" onchange="validateImage()">
                    <input type="submit" value="Add Post" id="submit">
                </form>
            </div>
        </main>
        <footer>
            &copy; Designed by: Rahul Kumar Jha
        </footer>
    </div>
    <script src="../js/script2.js" type="text/javascript"></script>
</body>
</html>