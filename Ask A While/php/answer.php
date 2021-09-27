<?php
include ('connection.php');
if(empty($_GET['email'])) {
    echo "<script>window.location.replace('join_us.php');</script>";
}
else {
    $gemail=$_GET['email'];
    $gid=$_GET['id'];
    if($_SERVER['REQUEST_METHOD']=='POST') {
        session_start();
        if(isset($_SESSION['email'])) {
            $email=$_SESSION['email'];
            $answer=$_POST['question'];
            $document=$_FILES['file']['name'];
            $tempname=$_FILES['file']['tmp_name'];
            $sql="select * from answer;";
            $result=mysqli_query($conn,$sql);
            if($result) {
                $num=mysqli_num_rows($result);
                $num=$num+1;
                if($document!='') {
                    $document=$num.$document;
                }
                $folder="../document2/".$document;
                move_uploaded_file($tempname, $folder);
                date_default_timezone_set('Asia/Kolkata');
                $date=date('Y/m/d');
                $sql="INSERT INTO `answer` (`gmail`, `gid`, `email`, `id`, `answer`, `document`, `date`) VALUES ('$gemail', '$gid', '$email', NULL, '$answer', '$document', '$date');";
                $result=mysqli_query($conn,$sql);
                if($result) {
                    echo "<script>alert('Successful Question Posted');</script>";
                    echo "<script>window.location.replace('my_profile.php');</script>";
                }
                else {
                    echo "<script>alert('Unsucessful Technical Error');</script>";
                }
            }
        }
        else {
            echo "<script>alert('Please Log In First');</script>";
            echo "<script>window.location.replace('join_us.php');</script>";
        }
    }
    $sql="select * from question where id='$gid';";
    $result=mysqli_query($conn,$sql);
    if($result) {
        $num=mysqli_num_rows($result);
    }
    else {
        echo "<script>window.location.replace('index.php');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer</title>
    <link rel="stylesheet" href="../css/style5.css">
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
                <div class="div0">
                    Question
                </div>
                <hr>
                <?php
                if($num>0) {
                ?>
                    <?php
                    while($row=mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="div1">
                            <div class="div2"><a href="../php/your_profile.php?email=<?php echo $row['email']?>"> <?php echo $row['email'] ?> </a></div>
                            <div class="div3"> <?php echo $row['question'] ?> </div>
                            <div class="div5"> <?php echo $row['date'] ?> </div>
                            <div class="div4">
                            <a href="../document/<?php echo $row['document'] ?>" download> <?php if(empty($row['document'])){
                                                                                                    echo "No Files Attached";
                                                                                                }
                                                                                                else {
                                                                                                    echo "Click To Download";
                                                                                                } ?> </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                <?php
                }
                else {
                ?>
                        <div class="div1">
                            <div class="div2"><a href="" style="text-decoration:none;">Not Specified</a></div>
                            <div class="div3"></div>
                            <div class="div5"></div>
                            <div class="div4">
                                <a href="">No Files Attached</a>
                            </div>
                        </div>
                <?php
                }
                ?>
                <hr>
                <div class="div0">
                    Answer
                </div>
                <hr>
                <?php
                $sql="select * from answer where gid='$gid';";
                $result=mysqli_query($conn,$sql);
                if($result) {
                    $num=mysqli_num_rows($result);
                }
                else {
                    echo "<script>window.location.replace('index.php');</script>";
                }
                ?>
                <?php
                if($num>0) {
                ?>
                    <?php
                    while($row=mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="div1">
                            <div class="div2"><a href="../php/your_profile.php?email=<?php echo $row['email']?>"> <?php echo $row['email'] ?> </a></div>
                            <div class="div3"> <?php echo $row['answer'] ?> </div>
                            <div class="div5"> <?php echo $row['date'] ?> </div>
                            <div class="div4">
                            <!-- <a href="../php/answer.php?id=<?php echo$row['id']?>&email=<?php echo$row['email']?>" style="background-color: #C33764; border-radius: 10px;">Click To Download </a> -->
                            <a href="../document2/<?php echo $row['document'] ?>" download > <?php if(empty($row['document'])){
                                                                                                        echo "No Files Attached";
                                                                                                    }
                                                                                                    else {
                                                                                                        echo "Click To Download";
                                                                                                    } ?> </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                <?php
                }
                else {
                ?>
                        <div class="div1">
                            <div class="div2"><a href="" style="text-decoration:none;">Not Specifiled</a></div>
                            <div class="div3"></div>
                            <div class="div5"></div>
                            <div class="div4">
                                <a href="">No File Attached</a>
                            </div>
                        </div>
                <?php
                }
                ?>
                <hr>
                <div class="div0">
                    Post Answer
                </div>
                <form action="answer.php?email=<?php echo $gemail ?> &id=<?php echo $gid ?>" onsubmit="return verify4()" method="POST" enctype="multipart/form-data">
                    <textarea name="question" id="question" placeholder="Add Your Question..." required></textarea>
                    <label for="file" id="label1">Attach File</label>
                    <input type="file" name="file" id="file" onchange="validateImage()">
                    <input type="submit" value="Add Post" id="submit">
                </form>
            </div>
        </main>
        <footer>
            &nbsp; Designed by: Rahul Kumar Jha
        </footer>
    </div>
    <script src="../js/script2.js" type="text/javascript"></script>
</body>
</html>