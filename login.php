<?php
session_start();

if (isset($_SESSION["Login"])) {
    header("location: index.php");
    exit;
}

require('koneksi.php');

if (isset($_POST['login'])) {
    $username = ($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($conn, $username);
    $password = ($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION["login"] = true;
        // Redirect user to index.php
        header("Location: index.php");
    } else {
        echo "<div class='form'>
<h3>Username/password Salah.</h3>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/styles/main.css">
</head>
<img src="assets/img/logo.png" width="100px" alt="logo">
<div class="text-container">
    <h1 style="color: #964b00;"><i>Coffee Valley</i></h1>
    <p>Taste the love in every cup!</p>
    <p>One Alewife Center 3rd Floor</p>
    <p>Cambridge, MA 02140</p>
</div>
<table>

    <form action="" method="post" name="login">
        <tr>
            <td>
                User ID : <input type="text" name="username" required />
            </td>
        </tr>
        <tr>
            <td>
                Password :<input type="password" name="password" required />
            </td>
        </tr>
        <tr>
            <td align="right">
                <input name="login" type="submit" value="Login" />
            </td>
        </tr>
    </form>
    </div>
    </body>

</html>