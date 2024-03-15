<?php
require('koneksi.php');
session_start();
if (!isset($_SESSION["login"])) {
    header("Location : login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $document = htmlspecialchars($_POST['document']);
    $author = htmlspecialchars($_POST['author']);

    $sql = "INSERT INTO files (title, document, author)values
    ('$title', '$document', '$author')";

    if (mysqli_query($conn, $sql)) {
        header("location: upload.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("location: upload.php");
    }
}
require "header.php"; ?>

<form action="" method="POST">
    <ul>
        <li><label for="name">Title: </label><input id="" type="text" name="title"></li>
        <li><label for="name">Document File: </label><input id="document" type="file" name="document"></li>
        <li><label for="name">author: </label><input id="author" type="text" name="author"></li>

    </ul>
    <button type="submit" name="submit">Upload</button>
</form>

<?php
require "footer.php";
?>