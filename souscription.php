<?php

include('includes/header.php');
include('includes/function-pdo.php');
include('includes/functions.php');

if (isset($_SESSION['id'])) {
    header('Location: login.php');
}

include('includes/navbar.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    if ($_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
        echo "Erreur : Veuillez choisir un avatar valide.";
        exit();
    }

    $avatar = $_FILES['avatar'];

    if (!empty($pseudo) && !empty($email) && !empty($mdp) && !empty($avatar)) {
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        nouvelUtilisateur($pseudo, $email, $hash, $avatar, $pdo);
    }
}

function nouvelUtilisateur($pseudo, $email, $hash, $avatar, $pdo)
{
    $uploadDirectory = 'avatar/';
    $targetFile = $uploadDirectory . basename($avatar['name']);
    move_uploaded_file($avatar['tmp_name'], $targetFile);

    $sqlCheck = "SELECT COUNT(*) FROM utilisateurs WHERE pseudo = :pseudo OR email = :email";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->bindParam(':pseudo', $pseudo);
    $stmtCheck->bindParam(':email', $email);
    $stmtCheck->execute();
    $count = $stmtCheck->fetchColumn();

    if ($count > 0) {
        echo "L'utilisateur existe déjà.";
        return;
    }

    $sql = "INSERT INTO utilisateurs (pseudo, email, password, avatar) 
            VALUES (:pseudo, :email, :hash, :avatar)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':hash', $hash);
    $stmt->bindParam(':avatar', $targetFile);
    $stmt->execute();

    header('Location: liste.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid black;
        border-radius: 10px;
        margin-top: 20px;
        padding: 30px;
        width: fit-content;
    }
</style>

<body>
    <div class="container">
        <h2>Inscription</h2>
        <form method="POST" enctype="multipart/form-data">

            <label for="pseudo">Pseudo:</label><br>
            <input type="text" id="pseudo" name="pseudo"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="mdp">Mot de passe:</label><br>
            <input type="password" id="mdp" name="mdp"><br>

            <label for="avatar">Avatar:</label><br>
            <input type="file" id="avatar" name="avatar" accept="image/*"><br><br>
            <input type="submit" value="Inscription">
        </form>
    </div>
</body>

</html>