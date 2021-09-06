<?php
include 'connecting_database.php';
$sql="select * from administrator";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Administrator Database</title>
    <link rel="stylesheet" href="../CSS/style5.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>STUDENT DATA MANAGEMENT SYSTEM</h1>
        </header>
        <main>
            <div id="div1">
                <h2>ADMINISTRATOR DATABASE DETAILS</h2>
                <div id="div2">
                    <table>
                        <thead>
                            <tr>
                                <th>USERNAME</th>
                                <th>FULL NAME</th>
                                <th>PASSWORD</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                        ?>
                        <tr>
                            <td> <?php echo $row['username'] ?> </td>
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo $row['password'] ?> </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <input type="button" value="PRINT" id="print" onclick="printDiv()">
            </div>
        </main>
        <footer>
            <p>RAHUL KUMAR JHA</p>
        </footer>
    </div>
</body>
</html>