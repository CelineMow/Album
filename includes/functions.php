<?php

function addAlbum($album, $artiste, $genre, $image, $annee, $description, $chansons, $pdo)
{
    $sql = "INSERT INTO disques (album, artiste, genre, image, annee, description) 
            VALUES (:album, :artiste, :genre, :image, :annee, :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'album' => $album,
        'artiste' => $artiste,
        'genre' => $genre,
        'image' => $image,
        'annee' => $annee,
        'description' => $description
    ]);

    $idalbum = $pdo->lastInsertId();

    foreach ($chansons as $titre) {
        insertChanson($idalbum, $titre, $pdo);
    }

    return true;
}

function insertChanson($idalbum, $titre, $pdo)
{
    $sql = "INSERT INTO chanson (idalbum, titre) VALUES (:idalbum, :titre)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['idalbum' => $idalbum, 'titre' => $titre]);
}

function getAlbum($id, $pdo)
{

    $sql = "SELECT album, artiste, genre FROM disques WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $params = ['id' => $id];
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function deleteAlbum($id, $pdo)
{
    // echo "Album supprimé";
    $sql = "DELETE FROM disques WHERE disques.id = :id";

    $stmt = $pdo->prepare($sql);
    $params = [
        'id' => $id,
    ];

    $result = $stmt->execute($params);

    return $result;
}

function getInfos($idalbum, $pdo)
{
    $sql = "SELECT id as idalbum, album, artiste, annee, description, image, background
          FROM disques 
          WHERE id = :idalbum";
    $params = ['idalbum' => $idalbum];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getSongs($idalbum, $pdo)
{
    $sql = "SELECT id, idalbum, titre 
          FROM chanson 
          WHERE idalbum = :idalbum";
    $params = ['idalbum' => $idalbum];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getAlbum1($idalbum, $pdo)
{

    $sql = "SELECT album, artiste, genre FROM disques WHERE id = :idalbum";
    $stmt = $pdo->prepare($sql);
    $params = ['idalbum' => $idalbum];
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function editAlbum($idalbum, $album, $artiste, $genre, $image, $background, $annee, $description, $pdo)
{

    $sql = "UPDATE disques
    SET album = :album, artiste = :artiste, genre = :genre, image = :image, background = :background, annee = :annee, description = :description 
    WHERE id = :idalbum;";

    $stmt = $pdo->prepare($sql);
    $params = [
        'idalbum' => $idalbum,
        'album' => $album,
        'artiste' => $artiste,
        'genre' => $genre,
        'image' => $image,
        'background' => $background,
        'annee' => $annee,
        'description' => $description,
    ];

    $result = $stmt->execute($params);
    return $result;
}

function getUtilisateur($pdo)
{
    if (!isset($_SESSION['email'])) {
        return "Adresse e-mail non définie dans la session";
    }

    $email = $_SESSION['email'];

    $sql = "SELECT pseudo, avatar FROM utilisateurs WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        return "Utilisateur non trouvé dans la base de données";
    }

    return $result;
}


function getDisques($pdo)
{

    $sql = "SELECT D.id as idalbum,album,artiste,image, G.genre FROM disques D INNER JOIN genre G ON G.id = D.genre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function addUser($email, $password, $pdo)
{

    $sql = "INSERT INTO utilisateurs (email,password) VALUES (:email,:password)";
    $stmt = $pdo->prepare($sql);
    $params = ['email' => $email, 'password' => $password];
    $result = $stmt->execute($params);
    return $result;
}
