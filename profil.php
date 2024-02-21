<?php
include('includes/header.php');
include('includes/function-pdo.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit(); // Arrêter l'exécution du script après la redirection
}

// Inclure la barre de navigation
include('includes/navbar.php');

// Récupérer les informations de l'utilisateur
$email = $_SESSION['email'];
$userInfo = getUserInfo($email, $pdo);

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $newEmail = isset($_POST['email']) ? $_POST['email'] : null;
    $newPassword = isset($_POST['password']) ? $_POST['password'] : null;

    // Mettre à jour les informations de l'utilisateur
    updateUserInfo($email, $newEmail, $newPassword, $pdo);
}

// Fonction pour récupérer les informations de l'utilisateur
function getUserInfo($email, $pdo)
{
    $sql = "SELECT pseudo, email FROM utilisateurs WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fonction pour mettre à jour les informations de l'utilisateur
function updateUserInfo($email, $newEmail, $newPassword, $pdo)
{
    // Mettre à jour l'email si nécessaire
    if (!empty($newEmail) && $newEmail !== $email) {
        $sqlUpdateEmail = "UPDATE utilisateurs SET email = :newEmail WHERE email = :email";
        $stmtUpdateEmail = $pdo->prepare($sqlUpdateEmail);
        $stmtUpdateEmail->bindParam(':newEmail', $newEmail);
        $stmtUpdateEmail->bindParam(':email', $email);
        $stmtUpdateEmail->execute();
    }

    // Mettre à jour le mot de passe si nécessaire
    if (!empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sqlUpdatePassword = "UPDATE utilisateurs SET password = :hashedPassword WHERE email = :email";
        $stmtUpdatePassword = $pdo->prepare($sqlUpdatePassword);
        $stmtUpdatePassword->bindParam(':hashedPassword', $hashedPassword);
        $stmtUpdatePassword->bindParam(':email', $email);
        $stmtUpdatePassword->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <div class="container">
        <h2>Modifier votre profil</h2>
        <form method="post">
            <label for="pseudo">Pseudo:</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?= $userInfo['pseudo'] ?>" disabled><br>

            <label for="email">Adresse e-mail:</label><br>
            <input type="email" id="email" name="email" value="<?= $userInfo['email'] ?>"><br>

            <label for="password">Nouveau mot de passe:</label><br>
            <input type="password" id="password" name="password"><br><br>

            <input type="submit" value="Enregistrer les modifications">
        </form>
    </div>
</body>

</html>