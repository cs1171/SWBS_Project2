<?php
session_start();
if (!(isset($_SESSION['login']))) {
    echo "Please log in to access this page.";
    ?><br><br><a href="mainpage.php">Main page</a>
<?php die(); }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User page</title>
</head>
<body>
<br><br>
This is the page standard users and administrators have access to.
You can sign out if you want to, or click one of the links.
<br><br>
User Info:<?php
$conn = new mysqli("earth.cs.utep.edu", "", "", "");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$username = "";

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
}

$query = "select * from account where user_name = '$username'";
$result = $conn->query($query);

mysqli_close($conn);

// to print out user info
echo "
    <table border='1'>
      <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Created</th>
        <th>Last login</th>
        <th>Administrator</th>
      </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo
        "<tr>",
        "<td>", $row['first_name'], "</td>",
        "<td>", $row['last_name'], "</td>",
        "<td>", $row['user_name'], "</td>",
        "<td>", $row['password'], "</td>",
        "<td>", $row['created'], "</td>",
        "<td>", $row['last_login'], "</td>",
        "<td>", $row['acct_type'], "</td>",
        "</tr>";
    }

    echo "</table><br><br>";

 // should only show sign out link if user is signed in
if(isset($_SESSION['login'])) { ?>
    <a href="/logout.php"><u>Sign out</u></a>
<?php } ?>
<a href="/cdsoto2/project2folder/mainpage.php"><u>Main page</u></a>
<a href="/cdsoto2/project2folder/admin.php"><u>Admin page</u></a>
</body>
</html>
