<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
</head>
<body>
<form action="mainpage.php">
    <div class="container">
        <button type="submit">Sign out</button>
    </div>
</form>
<br><br>
This is the page administrators get after signing in. You can sign out if you want to,
or click one of the links.
<br><br>
<a href="mainpage.php"><u>Main page</u></a>
<a href="user.php"><u>User page</u></a>
</body>
</html>