<?php
$severname="localhost";
$username="root";
$password="root";
$conn=mysqli_connect($severname,$username,$password);
if(!$conn)
{
    die("Connection Unsucessful");
}
else
{
    echo "Sucessfully Connected...";
}
echo "<br>";
$sql="CREATE DATABASE student_data_management_system";
$result=mysqli_query($conn,$sql);
if($result)
{
    echo "Database Created";
}
else
{
    echo "Database Not Created: ".mysqli_error($conn);
}
?>