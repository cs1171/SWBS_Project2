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
<form action="mainpage.php">
    <div class="container">
        <label><b>Username:</b></label>
        <input type="text" name="un" required>
        <br>
        <label><b>Password: </b></label>
        <input type="text" name="pw" required>

        <button type="submit">Sign in</button>
    </div>
    <?php
    $conn = new mysqli("localhost", "admin", "secret", "world");

    if (mysqli_connect_errno()) {
        printf("Connection to database failed: %s\n", mysqli_connect_error());
        exit();
    }

    if(isset($_POST["un"], $_POST["pw"])) {
        $username = $conn->real_escape_string($_POST["un"]);
        $password = $conn->real_escape_string(md5($_POST["pw"]));

        $query = $conn->query("SELECT * FROM db WHERE uname = '$username' AND pass = '$password'");
    }
    ?>
</form>
<br><br>
This is the sign in page. Go ahead and try it, or click one of the links.
<br><br>
<a href="mainpage.php"><u>Main page</u></a>
<a href="admin.php"><u>Admin page</u></a>
<a href="user.php"><u>User page</u></a>
</body>
</html>