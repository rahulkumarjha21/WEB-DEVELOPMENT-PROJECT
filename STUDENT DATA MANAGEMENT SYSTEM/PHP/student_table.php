<?php
include ('connecting_database.php');
echo "<br>";
$sql="CREATE TABLE `student_data_management_system`.`student` ( `username` INT(10) NOT NULL AUTO_INCREMENT ,  `profilephoto` VARCHAR(256) NOT NULL ,  `name` VARCHAR(256) NOT NULL ,  `branch` VARCHAR(256) NOT NULL ,  `semester` VARCHAR(256) NOT NULL ,  `dateofbirth` VARCHAR(256) NOT NULL ,  `email` VARCHAR(256) NOT NULL ,    PRIMARY KEY  (`username`)) ENGINE = InnoDB";
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