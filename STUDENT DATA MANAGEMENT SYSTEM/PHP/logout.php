<?php
session_start();
session_destroy();
header('location:administrator_login.php');
?>