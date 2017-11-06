<?php
session_start();
$error = "";

if(isset($_POST['submit'])) {
    if(empty($_POST['un']) || empty($_POST['pw'])) {
        $error = "Invalid login information.";
    }
    else {
        $username = $_POST['un'];
        $password = $_POST['pw'];

        $conn = new mysqli("earth.cs.utep.edu", "cdsoto2", "Blahblah22", "cdsoto2");

        $username = $conn->real_escape_string($_POST["un"]);
        $password = $conn->real_escape_string($_POST["pw"]);

        $db = $conn->select_db("cdsoto2");
        $query = $conn->query("select * from account where user_name = '$username' AND password = '$password'");
        $rows = mysqli_num_rows($query);
        $query="SELECT * FROM account WHERE acct_type = '".$acct_type."'";

        if($rows == 1) {
            $_SESSION['login'] = $username;

            if ($acct_type == 1)
                header("location: admin.php");
            else
                header("location: user.php");
        }
        else
            $error = "Invalid login information.";

        mysqli_close($conn);
    }
}
?>