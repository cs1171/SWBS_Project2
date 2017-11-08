<?php
session_start();

if (!(isset($_SESSION['login']))) {
   echo "Please log in to access this page.";
   ?><br><br><a href="mainpage.php">Main page</a>
<?php die(); }

$conn = new mysqli("earth.cs.utep.edu", "cdsoto2", "Blahblah22", "cdsoto2");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$username = "";

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
}

$query = "select * from account where user_name = '$username' AND acct_type = '1'";
$result = $conn->query($query);
$rows = mysqli_num_rows($result);
if($rows !== 1) {
    die("You do not have the appropriate access level for this page.");
}


$query = "select * from account";
$result = $conn->query($query);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
</head>
<body>
<br><br>
This is the page administrators have access to. You can sign out if you want to,
click one of the links, add a new user, or view a list of all users.
<br><br>
<form action="admin.php" method="post">
<div class="container">
    <button type="submit" name="submit" value = 'submit'>List users</button>
</div>
</form>
<?php
if(isset($_POST['submit'])) {
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

    echo "</table>";
} ?>
<br><br>
<form action="insert.php" method="post">
    <div class="container">
        <label><b>First Name:</b></label>
        <input id="firstname" type="text" name="firstname" required>
        <label><b>Last Name: </b></label>
        <input id="lastname" type="text" name="lastname" required>
        <label><b>Username: </b></label>
        <input id="username" type="text" name="username" required>
        <label><b>Password: </b></label>
        <input id="password" type="text" name="password" required>
        <label><b>Administrator: </b></label>
        <input id="admin" type="checkbox" name="admin" value='1'>

        <button type="submit" name="submit" value='adduser'>Add user</button>
    </div>
</form>
<br><br>
<?php
// should only show sign out link if user is signed in
if(isset($_SESSION['login'])) { ?>
    <a href="logout.php"><u>Sign out</u></a>
<?php } ?>
<a href="mainpage.php"><u>Main page</u></a>
<a href="user.php"><u>User page</u></a>
</body>
</html>