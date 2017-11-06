<?php
include('signin.php');
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
<form action="mainpage.php">
    <div class="container">
        <label><b>Username:</b></label>
        <input type="text" name="un" required>
        <br>
        <label><b>Password: </b></label>
        <input type="text" name="pw" required>

        <button type="submit">Sign in</button>
    </div>
</form><br><br>
This is the main page. Just imagine that there is interesting stuff here.<br>
    You can sign in if you want to, or click one of the links.
<br><br>
<?php if(isset($_SESSION['login'])) { ?>
    <a href="mainpage.php"><u>Sign out</u></a>
<?php } session_destroy() ?>
    <a href="admin.php"><u>Admin page</u></a>
    <a href="user.php"><u>User page</u></a>
</body>
</html>