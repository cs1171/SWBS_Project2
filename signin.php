<?php
session_start();
$error = "";
$rand = 'f9ADkfa9fjakAJF03';

$_SESSION['username'] = "";

if(isset($_POST['submit'])) {
    if(empty($_POST['un']) || empty($_POST['pw'])) {
        echo "Invalid login information.";
    }
    else {
        $username = $_POST['un'];
        $password = $_POST['pw'];

        $conn = new mysqli("earth.cs.utep.edu", "cdsoto2", "Blahblah22", "cdsoto2");

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        $username = $conn->real_escape_string($_POST["un"]);
        $password = $conn->real_escape_string($_POST["pw"]);

        $password = $rand.$username.$password;
        $password = md5($password);

        $_SESSION['username'] = $username;

        $db = $conn->select_db("cdsoto2");
        $query = "select * from account where user_name = '$username' AND password = '$password'";
        $result = $conn->query($query);
        $rows = mysqli_num_rows($result);
        $timestamp = "UPDATE account SET last_login = NOW() WHERE user_name = '$username'";

        if($rows == 1) {
            $_SESSION['login'] = true;
            $conn->query($timestamp);
            header("mainpage.php");
            echo "Successfully logged in as ".$username;
        }
        else {
            header("mainpage.php");
            echo "Invalid login information.";
        }
        //session_write_close();
        mysqli_close($conn);
    }
}
?>