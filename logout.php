<?php
// code to handle logout/session destroy. returns to mainpage.php
sleep(1);
session_start();
session_destroy();
header('Location: /cdsoto2/project2folder/mainpage.php');
?>