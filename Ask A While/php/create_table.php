<?php
    $severname="sql205.epizy.com";
    $username="epiz_29879506";
    $password="XxFdvNwzles2de1";
    $database="ask_a_while";
    $conn=mysqli_connect($severname,$username,$password,$database);
    if(!$conn)
        die("Connection Unsucessful");
    else
    {
        echo "Sucessfully Connected...";
        echo "<br>";
        $sql="CREATE TABLE `ask_a_while`.`guest` ( `email` VARCHAR(256) NOT NULL ,  `name` VARCHAR(256) NOT NULL ,  `phone` BIGINT(10) NOT NULL ,  `password` VARCHAR(256) NOT NULL ,  `otp` INT(6) NOT NULL ) ENGINE = InnoDB;";
        $result=mysqli_query($conn,$sql);
        if($result) {
            echo "Table Created";
        }
        else {
            echo "Table Not Created".mysqli_error($conn);
        }
        echo "<br>";
        $sql="CREATE TABLE `ask_a_while`.`question` ( `email` VARCHAR(256) NOT NULL ,  `id` INT(10) NOT NULL AUTO_INCREMENT ,  `question` LONGTEXT NOT NULL ,  `document` VARCHAR(256) NOT NULL ,  `answer` INT(10) NOT NULL ,  `date` VARCHAR(256) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;";
        $result=mysqli_query($conn,$sql);
        if($result) {
            echo "Table Created";
        }
        else {
            echo "Table Not Created".mysqli_error($conn);
        }
        echo "<br>";
        $sql="CREATE TABLE `ask_a_while`.`answer` ( `gmail` VARCHAR(256) NOT NULL ,  `gid` BIGINT(10) NOT NULL ,  `email` VARCHAR(256) NOT NULL ,  `id` BIGINT(10) NOT NULL AUTO_INCREMENT ,  `answer` LONGTEXT NOT NULL ,  `document` VARCHAR(256) NOT NULL ,  `date` VARCHAR(256) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;";
        $result=mysqli_query($conn,$sql);
        if($result) {
            echo "Table Created";
        }
        else {
            echo "Table Not Created".mysqli_error($conn);
        }
        echo "<br>";
        $sql="CREATE TABLE `ask_a_while`.`admin_query` ( `email` VARCHAR(256) NOT NULL ,  `query` LONGTEXT NOT NULL ) ENGINE = InnoDB;";
        $result=mysqli_query($conn,$sql);
        if($result) {
            echo "Table Created";
        }
        else {
            echo "Table Not Created".mysqli_error($conn);
        }
    }
?>