<?php
include ('connecting_database.php');
echo "<br>";
$sql="CREATE TABLE `student_data_management_system`.`administrator` ( `username` INT(10) NOT NULL AUTO_INCREMENT ,  `name` VARCHAR(256) NOT NULL ,  `password` VARCHAR(256) NOT NULL ,    PRIMARY KEY  (`username`)) ENGINE = InnoDB";
$result=mysqli_query($conn,$sql);
if($result)
{
    echo "Table Created";
}
else
{
    echo "Table Not Created".mysqli_error($conn);
}
?>