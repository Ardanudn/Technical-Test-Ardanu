<?php
require('koneksi.php');
session_start();
if (!isset($_SESSION["login"])) {
    header("Location : login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $distributorName = htmlspecialchars($_POST['distributorName']);
    $city = htmlspecialchars($_POST['city']);
    $region = htmlspecialchars($_POST['region']);
    $country = htmlspecialchars($_POST['country']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    $sql = "INSERT INTO distributor (distributorName, city, region, country, phone, email)values
    ('$distributorName', '$city', '$region', '$country', '$phone', '$email')";

    if (mysqli_query($conn, $sql)) {
        header("Location: distributor.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("Location: add_distributor.php");
    }
}

require "header.php"; ?>

<form action="" method="POST">
    <ul>
        <li><label for="name">Distributor Name: </label><input id="distributorName" type="text" name="distributorName"></li>
        <li><label for="name">City: </label><input id="city" type="text" name="city"></li>
        <li><label for="name">State/Region: </label><input id="text" type="text" name="region"></li>
        <li><label for="name">Country: </label>
            <select name="country" id="country">
                <option value="Australia">Australia</option>
                <option value="Singapore">Singapore</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Indonesia">Indonesia</option>
            </select>
        </li>
        <li><label for="name">Phone: </label><input id="phone" type="phone" name="phone"></li>
        <li><label for="name">email: </label><input id="email" type="email" name="email"></li>

    </ul>
    <button type="submit" name="submit">Add</button>
</form>

<?php
require "footer.php";
?>