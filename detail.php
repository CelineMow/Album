<?php
//
include('includes/header.php');
include('includes/functions.php');

// print_r($_SESSION);

$idalbum = 0;

if (isset($_GET['idalbum'])) {
  $idalbum = $_GET['idalbum'];

  $infos = getInfos($idalbum, $pdo);
  $songs = getSongs($idalbum, $pdo);
  //print_r($infos);
  // print_r($songs);
}

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
}

$info = $infos[0];
// print_r($info);

$song = $songs;
// print_r($song);

?>

<body>
  <style>
    body {
      background-color: #121212;
      color: #F5F5F5;
    }

    @media screen and (min-width: 768px) {
      .page {
        display: flex;
        flex-direction: row;
        margin-left: 150px;
        margin-right: 50px;
      }

      .info-column {
        flex: 0 0 70%;
        padding-right: 20px;
        justify-content: space-between;
        overflow: visible;
      }

      .containersong {
        /* flex: 0 0 30%; */
        padding-left: 50px;
        padding-right: 50px;
        border: 1px solid rgba(255, 94, 98, 0.7);
        background-color: #242424;
        border-radius: 10px;
      }

      .background {
        width: 1140px;
        height: 500px;
        animation: spin 2s linear;
        opacity: 0.5;
        background-size: cover;
        border-radius: 60px;
        padding: 50px;
      }

      .imgalbum {
        width: 200px;
        height: 200px;
        margin-left: 20px;
        border-radius: 15px;
        opacity: 0.8;
      }

      .container {
        display: flex;
        margin: 10px;
        align-items: left;
        flex-direction: row;
      }

      p {
        text-align: justify;
        margin-left: 20px;
        border: 1px solid rgba(255, 94, 98, 0.7);
        background-color: #242424;
        border-radius: 10px;
        padding: 35px;
        margin-right: 50px;

      }

      .annee {
        margin-top: 20px;
        margin-left: 20px;
        color: #B0B0B0;
        opacity: 0.8;
      }

      h1 {
        margin-left: 100px;
        margin-top: 20px;
      }

      table {
        border-collapse: collapse;
        text-align: left;
        height: 70px;
        margin-top: 20px;
      }

      th,
      td {
        height: 60px;
        padding: 10px;
        text-align: left;
      }

      h3 {
        margin-left: 20px;
        margin-right: 20px;
        color: #B0B0B0;
      }

    }


    @media screen and (max-width: 767px) {
      .page {
        display: flex;

      }

      .info-column {
        flex-direction: row;
        flex: 0 0 70%;
        padding-right: 10px;
        justify-content: space-between;
      }

      .containersong {
        display: flex;
        margin-right: 10px;
        margin-top: 10px;
        padding: 10px;
      }

      .container {
        display: flex;
        width: 100%;
        margin-left: 10px;
        flex-direction: row-reverse;
        margin-top: 45px;
        padding: 0px;
      }

      p {
        position: relative;
        text-align: justify;
        width: 70%;
        margin-left: 40px;

      }

      .annee {
        margin-top: 20px;
        margin-left: 10px;
        color: grey;
        opacity: 0.8;

      }

      .imgalbum {
        margin-left: 20px;
        width: 30%;
        max-width: 100%;
        height: 100%;
        order: 2;
        border-radius: 10px;
      }


      .image-container {
        display: flex;
        flex-direction: column;
      }

      .background {
        display: none;
        width: 90%;
        max-width: 100%;
        height: auto;
        animation: spin 2s linear;
        opacity: 0.3;
        background-size: cover;
        border-radius: 20px;
        margin-left: 20px;
        margin-top: 30px;
      }

      h1 {
        margin-top: 20px;
        margin-bottom: 10px;
        text-align: center;
        font-size: 2em;
      }

      table {
        border-collapse: collapse;
        text-align: left;
        height: 20px;
        margin-top: 20px;
        margin-left: 20px;
      }

      th,
      td {
        height: 40px;
        padding: 1px;
        text-align: left;

      }

      h3 {
        margin-left: 10px;
        margin-right: 10px;
        color: #B0B0B0;
      }

    }

    @keyframes spin {
      0% {
        transform: rotateY(0deg);
      }

      100% {
        transform: rotateY(360deg);
      }
    }

    .image-container {
      display: flex;
      flex-direction: row;
    }

    .album {
      margin-top: 50px;
      margin-left: 20px;
    }
  </style>

  <?php
  include('includes/navbar.php');
  ?>
  <h1><?= $info['artiste'] . ' - ' . $info['album'] ?> <div class="annee"><?= $info['annee']; ?></div>
  </h1>

  <?php
  // echo '<pre>';
  // print_r($Albums[0]);
  // echo '</pre>';

  // for ($i = 0; $i < $infos; $i++) {
  //   //  print_r($i = 0);
  // }



  ?>
  <div class="page">
    <div class="info-column">
      <div class="image-container">
        <img src="<?= $info['background'] ?>" class="background">
      </div>
      <div class="container">
        <img src="<?= $info['image'] ?>" class="imgalbum">
        <div class="description">
          <p><?= $info['description']; ?></p>
        </div>
      </div>
    </div>
    <div class="containersong">
      <table>
        <thead>
          <tr>

            <th colspan="2">
              <h3>Chansons</h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($songs as $index => $song) : ?>
            <tr>
              <th scope="row"><?= $index + 1 ?></th>
              <td><?= $song['titre']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
<?php
include('includes/snippets.php');
?>

</html>