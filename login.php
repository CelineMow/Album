<?php

include('includes/header.php');
include('includes/function-pdo.php');

if (count($_POST) > 0) {
  if (isValid($_POST['email'], $_POST['password'], $pdo)) {
    $_SESSION['email'] = $_POST['email'];
    header('Location: liste.php');
  } else {
    header('Location: login.php');
  }
} else {

?>

  <body>
    <?php
    include('includes/navbar.php');
    ?>
    <style>
      a {
        color: white;
        text-decoration: none;
      }

      body {
        background-color: #121212;
        color: #F5F5F5;
      }

      .page {
        margin-top: 50px;
        padding: 50px;
        border: 1px solid rgba(255, 94, 98, 0.7);
        background-color: #242424;
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

      .champs .custom-file-input {
        background-color: #242424;
        color: #F5F5F5;

      }

      .champs input[type="text"],
      .champs input[type="number"],
      .champs textarea,
      .champs select {
        background-color: #242424;
        color: #F5F5F5;
      }
    </style>
    <div class="page">
      <div class="container">
        <h1>Page de login</h1>
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <div class="champs"><input required type="email" class="form-control" name="email" id="exampleInputEmail1" value="" aria-describedby="emailHelp"></div>

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <div class="champs"><input required type="password" name="password" class="form-control" id="exampleInputPassword1"></div>
          </div>

          <button type="submit" class="btn-add">Se connecter</button>
          <button type="submit" class="btn-add"><a href="souscription.php">Création d'un compte</a></button>
        </form>
      </div>
    </div>
  </body>
  <?php
  include('includes/snippets.php');
  ?>

  </html>

<?php
}
?>