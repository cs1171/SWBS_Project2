<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <style>
        label {
            display: inline-block;
            width: 140px;
            text-align: right;
        }​
    </style>
</head>
<body>
This is the main page. Just imagine that there is interesting stuff here.<br>
    You can sign in if you want to, or click one of the links.
<br><br>
    <a href="signin.php"><u>Sign in</u></a>
    <a href="admin.php"><u>Admin page</u></a>
    <a href="user.php"><u>User page</u></a>
</body>
</html>