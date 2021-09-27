<?php
include 'php/connection.php';
$sql="select * from question";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Ask A While</h1>
        </header>
        <nav>
            <a href="index.php">Home</a>
            <a href="php/contact_us.php">Contact Us</a>
            <a href="php/join_us.php">Join Us</a>
            <a href="php/my_profile.php">My Profiile</a>
        </nav>
        <main>
            <div id="content">
                <?php
                if($num>0) {
                ?>
                    <?php
                    while($row=mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="div1">
                            <div class="div2"><a href="php/your_profile.php?email=<?php echo $row['email']?>"> <?php echo $row['email'] ?> </a></div>
                            <div class="div3"> <?php echo $row['question'] ?> </div>
                            <div class="div5"> <?php echo $row['date'] ?> </div>
                            <div class="div4" id="<?php echo $row['id'] ?>">
                            <a href="php/answer.php?id=<?php echo$row['id']?>&email=<?php echo$row['email']?>">Answer</a>
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
                            <div class="div2"><a href="" style="text-decoration:none">Not Specified</a></div>
                            <div class="div3"></div>
                            <div class="div5"></div>
                            <div class="div4">
                                <a href=""> Answers</a>
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