<?php
// code to handle logout/session destroy. returns to mainpage.php
sleep(1);
session_start();
session_destroy();
header('Location: mainpage.php');
?>