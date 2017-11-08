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
<?php // this block should only show if user is not signed in
if(!(isset($_SESSION['login']))) { ?>
    <form action="" method="post">
        <div class="container">
           <label><b>Username:</b></label>
            <input id="un" type="text" name="un" placeholder="username" required>
            <br>
           <label><b>Password: </b></label>
           <input id="pw" type="password" name="pw" placeholder="password" required>

           <button type="submit" name="submit" value = 'login'>Sign in</button>
     </div>
    </form>
<?php } ?>
<br><br>
This is the main page. Just imagine that there is interesting stuff here.<br>
    You can sign in/out if you want to, or click one of the links.
<br><br>
<?php // should only show sign out link if user is signed in
if(isset($_SESSION['login'])) { ?>
    <a href="logout.php"><u>Sign out</u></a>
<?php } ?>
    <a href="admin.php"><u>Admin page</u></a>
    <a href="user.php"><u>User page</u></a>
</body>
</html>