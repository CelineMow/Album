<?php
include('includes/header.php');
include('includes/function-pdo.php');
include('includes/functions.php');

// print_r($_SESSION);

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
}

$pseudo_avatar = getUtilisateur($pdo);

$pseudo = $pseudo_avatar['pseudo']; // Récupération du pseudo de l'utilisateur
$avatar = $pseudo_avatar['avatar']; // Récupération du chemin de l'avatar de l'utilisateur

$disques = [];

$disques = getDisques($pdo);

?>

<body>
  <script src="https://kit.fontawesome.com/6cc5d9a1eb.js" crossorigin="anonymous"></script>

  <style>
    body {
      background-color: #121212;
      color: #F5F5F5;
    }

    .btn {
      color: #fff;
      background: linear-gradient(to right, rgba(255, 94, 98, 0.8), rgba(255, 153, 102, 0.8));
      padding: 5px 10px;
      border: solid rgba(255, 94, 98, 0.5) 2px;
      border-radius: 20px;
      display: flex;
      flex-direction: row;
      align-items: center;
      cursor: pointer;
      opacity: 0.9;
    }

    .btn-delete {
      color: #fff;
      background: linear-gradient(to right, rgba(179, 18, 23, 0.8), rgba(229, 45, 39, 0.8));
      padding: 5px 10px;
      border: solid rgba(179, 18, 23, 0.8) 2px;
      border-radius: 20px;
      display: flex;
      flex-direction: row;
      align-items: center;
      cursor: pointer;
      opacity: 0.9;
      margin-right: auto;
    }

    .btn-add {
      color: #fff;
      background: linear-gradient(to right, rgba(255, 94, 98, 0.8), rgba(255, 153, 102, 0.8));

      padding: 10px 20px;
      border: rgba(255, 94, 98, 0.5) 2px solid;
      border-radius: 20px;
      display: flex;
      flex-direction: row;
      justify-content: right;
      cursor: pointer;
      opacity: 0.9;
      margin-top: 30px;
    }

    h1 {
      margin-top: 30px;
      margin-bottom: 30px;
      padding-top: 30px;
      background: linear-gradient(to right, rgba(255, 94, 98, 0.8), rgba(255, 153, 102, 0.8));
      border-radius: 10px;
      padding-bottom: 30px;
    }

    a {
      color: #F5F5F5;
    }

    .avatar {
      float: left;
      margin-right: 20px;
      margin-left: 20px;
      margin-top: 10px;
      margin-bottom: 10px;
      border-radius: 50%;
      width: 90px;
      height: 90px;
    }

    td {
      padding: 20px;
    }

    th {
      width: auto;
      font-size: 1.2em;
      padding: 20px;
    }

    .thAlbum {
      padding-left: 40px;
    }

    table {
      background-color: #242424;
      /* border: 1px solid rgba(255, 94, 98, 0.7);
      border-radius: 11px; */
      width: 100%;
      text-align: left;
    }

    .pochette {
      width: 100px;
      height: 100px;
      border-radius: 25px;
      padding: 20px;
    }
  </style>

  <?php
  include('includes/navbar.php');
  ?>

  <div class="container">
    <img src="<?php echo $avatar ?>" class="avatar">
    <h1>Bienvenue <?php echo $pseudo ?></h1>
    <table>
      <!-- <thead> -->
      <!-- <tr> -->
      <th scope="col">#</th>
      <th scope="col">Album</th>
      <th scope="col">Artiste</th>
      <th scope="col">Genre</th>
      <!-- </tr> -->
      <!-- </thead> -->
      <tbody>

        <?php

        for ($i = 0; $i < count($disques); $i++) {

        ?>
          <tr>
            <td scope="row"><?= $i + 1 ?></td>
            <td><a style="text-decoration: none;" href="detail.php?idalbum=<?= $disques[$i]['idalbum'] ?>"><img class="pochette" src="<?= $disques[$i]['image'] ?>"><?= $disques[$i]['album'] ?></a></td>
            <td><?= $disques[$i]['artiste'] ?></td>
            <td><?= $disques[$i]['genre'] ?></td>
            <td><a style="text-decoration: none;" href="edit_album.php?idalbum=<?= $disques[$i]['idalbum'] ?>"><button type="submit" class="btn"><i class="fa-solid fa-pen"></i></a></td>
            <td><a style="text-decoration: none;" href="delete_album.php?id=<?= $disques[$i]['idalbum'] ?>"><button type="submit" class="btn-delete"><i class="fa-solid fa-trash"></i></a></td>

          </tr>


        <?php

        }

        ?>


      </tbody>
    </table>
    <a style="text-decoration: none;" href="add_album.php?id="><button type="submit" class="btn-add">ADD <i class="fa-solid fa-circle-plus"></i></a>
  </div>

</body>
<?php
include('includes/snippets.php');
?>

</html>