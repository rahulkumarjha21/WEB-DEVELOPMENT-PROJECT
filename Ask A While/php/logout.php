<?php
session_start();
session_destroy();
header('location:join_us.php');
?>