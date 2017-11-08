<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
if(isset($_POST['admin'])) {
    $admin = $_POST['admin'];
} else
    $admin = "0";
$date = date("Y-m-d");
$rand = 'f9ADkfa9fjakAJF03';

$conn = new mysqli("earth.cs.utep.edu", "cdsoto2", "Blahblah22", "cdsoto2");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$firstname = $conn->real_escape_string($_POST["firstname"]);
$lastname = $conn->real_escape_string($_POST["lastname"]);
$username = $conn->real_escape_string($_POST["username"]);
$password = $conn->real_escape_string($_POST["password"]);

// salt and hash for password
$password = $rand.$username.$password;
$password = md5($password);

$query = "INSERT INTO `account`(`first_name`, `last_name`, `user_name`, `password`,
`created`, `last_login`, `acct_type`) VALUES ('$firstname','$lastname','$username','$password','$date','NULL','$admin')";

if(mysqli_query($conn, $query)) {
    echo "User successfully added to database.";
} else {
    echo "Error adding user to database.";
}
mysqli_close($conn);

echo "<script>location.href='/cdsoto2/project2folder/admin.php';</script>";

?>