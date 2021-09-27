<?php
$severname="sql205.epizy.com";
$username="epiz_29879506";
$password="XxFdvNwzles2de1";
$conn=mysqli_connect($severname,$username,$password);
if(!$conn)
    die("Connection Unsucessful");
else
{
    echo "Sucessfully Connected...";
    echo "<br>";
    $sql="CREATE DATABASE ask_a_while";
    $result=mysqli_query($conn,$sql);
    if($result)
        echo "Database Created";
    else
        echo "Database Not Created: ".mysqli_error($conn);
}
?>