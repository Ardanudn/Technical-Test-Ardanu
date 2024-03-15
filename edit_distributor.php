<?php
require('koneksi.php');
session_start();
if (!isset($_SESSION["login"])) {
    header("Location : login.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM distributor WHERE id = '$id'");

// save the update
if (isset($_POST['submit'])) {
    $distributorName = htmlspecialchars($_POST['distributorName']);
    $city = htmlspecialchars($_POST['city']);
    $region = htmlspecialchars($_POST['region']);
    $country = htmlspecialchars($_POST['country']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    $sql_update = "UPDATE distributor SET 
        distributorName = '$distributorName', 
        city = '$city',
        region = '$region', 
        country ='$country', 
        phone = '$phone', 
        email ='$email' 
    where id = '$id'";

    if (mysqli_query($conn, $sql_update)) {
        header("Location: distributor.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
        header("Location: add_distributor.php");
    }
}


// retrive data into form
while ($data = mysqli_fetch_array($query)) {
?>
    <?php
    require "header.php"; ?>

    <form action="" method="post">
        <ul>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <li><label for="name">Distributor Name: </label><input id="distributorName" type="text" name="distributorName" value="<?= $data['distributorName'] ?>"></li>
            <li><label for="name">City: </label><input id="city" type="text" name="city" value="<?= $data['city'] ?>"></li>
            <li><label for="name">State Region: </label><input id="region" type="text" value="<?= $data['region'] ?>" name="region"></li>
            <li><label for="name">Country: </label>
                <select name="country" id="country">
                    <option value="Australia" <?php echo ($data['country'] == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                    <option value="Singapore" <?php echo ($data['country'] == 'Singapore') ? 'selected' : ''; ?>>Singapore</option>
                    <option value="Malaysia" <?php echo ($data['country'] == 'Malaysia') ? 'selected' : ''; ?>>Malaysia</option>
                    <option value="Indonesia" <?php echo ($data['country'] == 'Indonesia') ? 'selected' : ''; ?>>Indonesia</option>
                </select>
            </li>
            <li><label for="name">Phone: </label><input id="phone" type="phone" value="<?= $data['phone'] ?>" name="phone"></li>
            <li><label for="name">email: </label><input id="email" type="email" value="<?= $data['email'] ?>" name="email"></li>

        </ul>
        <button type="submit" name="submit">Edit</button>
    </form>
<?php }
require "footer.php";
?>