<?php
include('includes/header.php');
include('includes/function-pdo.php');
include('includes/functions.php');


if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

$album = "";
$artiste = "";
$genre = "";
$image = "";
$annee = "";
$description = "";
$chansons = [];

$tmpName = isset($_FILES['fichier']['tmp_name']) ? $_FILES['fichier']['tmp_name'] : "";
$name = isset($_FILES['fichier']['name']) ? $_FILES['fichier']['name'] : "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $album = $_POST['album'];
    $artiste = $_POST['artiste'];
    $genre = isset($_POST['genre']) ? intval($_POST['genre']) : 0;
    $image = $tmpName;
    move_uploaded_file($tmpName, './uploads/' . $name);
    $chemin_dans_bdd = 'uploads/' .  $name;
    $annee = $_POST['annee'];
    $description = $_POST['description'];
    $chansons = isset($_POST['chansons']) ? $_POST['chansons'] : [];


    if (empty($chansons)) {
        $error_message = "Veuillez entrer au moins une chanson.";
    } else {
        $result = addAlbum($album, $artiste, $genre, $chemin_dans_bdd, $annee, $description, $chansons, $pdo);

        if ($result) {
            echo "Album inséré";
        }
    }
}

?>


<body>
    <script src="https://kit.fontawesome.com/6cc5d9a1eb.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #121212;
            color: #F5F5F5;
        }

        .champs .custom-file-input {
            background-color: #242424 !important;
            color: #F5F5F5;

        }

        .champs input[type="text"],
        .champs input[type="number"],
        .champs textarea,
        .champs select {
            background-color: #242424;
            color: #F5F5F5;
        }

        .btn-add {
            color: #fff;
            background: linear-gradient(to right, rgba(255, 94, 98, 0.8), rgba(255, 153, 102, 0.8));
            padding: 5px 10px;
            border: rgba(255, 94, 98, 0.5) 2px solid;
            justify-content: right;
            cursor: pointer;
            opacity: 0.9;
            border-radius: 15px;
        }

        .btn-delete {
            color: #fff;
            background: linear-gradient(to right, rgba(179, 18, 23, 0.8), rgba(229, 45, 39, 0.8));
            padding: 5px 10px;
            border: solid rgba(179, 18, 23, 0.8) 2px;
            display: flex;
            flex-direction: row;
            align-items: center;
            cursor: pointer;
            opacity: 0.9;
            margin-right: auto;
        }
    </style>

    <?php
    include('includes/navbar.php');
    ?>
    <div class="container mt-5">
        <h1 class="mb-4">Ajout d'un album</h1>
        <form action="add_album.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="album">Album</label>
                <div class="champs"><input type="text" class="form-control" id="album" name="album" required>
                </div>
            </div>
            <div class="form-group">
                <label for="artiste">Artiste</label>
                <div class="champs"><input type="text" class="form-control" id="artiste" name="artiste" required>
                </div>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <div class="champs"><select class="form-control" id="genre" name="genre" required>
                        <div class="champs">
                            <option value="">Sélectionner un genre</option>
                        </div>
                        <div class="champs">
                            <option value="1">Rock</option>
                        </div>
                        <div class="champs">
                            <option value="2">Pop</option>
                        </div>
                        <div class="champs">
                            <option value="3">Rap</option>
                        </div>
                    </select>
                </div>
            </div>
            <div class="form-group champs">
                <label for="fichier">Image de l'album</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fichier" name="fichier" required>
                        <label class="custom-file-label" for="fichier">Choisir un fichier</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="annee">Année de sortie</label>
                <div class="champs"><input type="text" class="form-control" id="annee" name="annee" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <div class="champs"><textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
            </div>
            <div class="form-group" id="chansons-wrapper">
                <label>Chansons</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="chansons[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn-delete" onclick="supprimerChanson(this)"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn-add" onclick="ajouterChanson()">ADD Song</button>
            <button type="submit" class="btn-add">Ajouter l'album</button>
        </form>
    </div>

    <!-- <div id="chansons-wrapper">
        <div class="input-group mb-2 champs">
            <input type="text" class="form-control" name="chansons[]" required>
            <div class="input-group-append">
                <button type="button" class="btn btn-danger" onclick="supprimerChanson(this)">Supprimer</button>
            </div>
        </div>
    </div> -->

    <script>
        window.addEventListener('DOMContentLoaded', (event) => {

            const premierChamp = document.querySelector('#chansons-wrapper .input-group');


            if (premierChamp && !premierChamp.classList.contains('champs')) {

                premierChamp.classList.add('champs');
            }
        });

        function ajouterChanson() {
            const chansonsWrapper = document.getElementById('chansons-wrapper');
            const nombreChansons = chansonsWrapper.children.length + 1;

            const chansonDiv = document.createElement('div');
            chansonDiv.className = 'input-group mb-2 champs';
            chansonDiv.innerHTML = `
        <input type="text" class="form-control" name="chansons[]" required>
        <div class="input-group-append">
            <button type="button" class="btn-delete" onclick="supprimerChanson(this)"><i class="fa-solid fa-trash"></i></button>
        </div>
    `;

            chansonsWrapper.appendChild(chansonDiv);
        }


        function supprimerChanson(button) {
            const chansonDiv = button.closest('.input-group');
            chansonDiv.remove();
        }
    </script>

</body>