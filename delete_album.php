<?php
include('includes/header.php');
include('includes/function-pdo.php');
include('includes/functions.php');

// print_r($_SESSION);

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$result = deleteAlbum($id, $pdo);


header('Location: liste.php');
exit();
