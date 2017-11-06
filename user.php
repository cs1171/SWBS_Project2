<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User page</title>
</head>
<body>
<form action="mainpage.php">
    <div class="container">
        <button type="submit">Sign out</button>
    </div>
</form>
<br><br>
This is the page standard users get after signing in. You can sign out if you want to,
or click one of the links.
<br><br>
<a href="mainpage.php"><u>Main page</u></a>
<a href="admin.php"><u>Admin page</u></a>
</body>
</html>