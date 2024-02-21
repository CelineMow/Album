<?php
include('includes/header.php');
include('includes/function-pdo.php');
include('includes/functions.php');

// print_r($_SESSION);

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

if (isset($_GET['idalbum'])) {
    $idalbum = $_GET['idalbum'];
    $result = getAlbum1($idalbum, $pdo);
}

if (isset($_POST) && !empty($_POST)) {
    $album = $_POST['album'];
    $artiste = $_POST['artiste'];
    $genre = $_POST['genre'];
    $idalbum = $_POST['idalbum'];
    $image = $_POST['image'];
    $background = $_POST['background'];
    $annee = $_POST['annee'];
    $description = $_POST['description'];
    $chanson = $_POST['chanson'];

    $result = editAlbum($idalbum, $album, $artiste, $genre, $image, $background, $annee, $description, $pdo);

    header('Location: liste.php');
}

?>

<body>
    <?php
    include('includes/navbar.php');
    ?>

    <div class="container">
        <h1>Edition d'un Album</h1>
        <form action="edit_album.php" method="post">
            <div class="form-group">
                <label for="exampleInputtitre">Album</label>
                <input type="text" class="form-control" name="album" value="<?= $result['album'] ?>" />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Artiste</label>
                <input type="text" class="form-control" name="artiste" value="<?= $result['artiste'] ?>" />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Genre</label>
                <select class="form-control" name="genre">
                    <option value="1" <?= ($result['genre'] == "1" ? "selected" : "") ?>>Rock</option>
                    <option value="2" <?= ($result['genre'] == "2" ? "selected" : "") ?>>Hard Rock</option>
                    <option value="3" <?= ($result['genre'] == "3" ? "selected" : "") ?>>Country Rock</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Bannière</label>
                <input type="text" class="form-control" name="background" value="Copier/coller adresse de l'image" />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Image</label>
                <input type="text" class="form-control" name="image" value="Copier/coller adresse de l'image" />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Année</label>
                <input type="text" class="form-control" name="annee" value="" />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Description</label>
                <input type="text" class="form-control" name="description" value="" />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Chansons</label>
                <input type="text" class="form-control" name="chanson" value="" />
            </div>
            <input type="hidden" name="idalbum" value="<?= $idalbum ?>">
            <button type="submit" class="btn btn-primary">Editer</button>
        </form>
    </div>
</body>