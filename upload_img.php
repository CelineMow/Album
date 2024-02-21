<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
// var_dump($_POST);
echo '<pre>';
print_r($_FILES);
echo '</pre>';
$tmpName = $_FILES['fichier']['tmp_name'];
$name = $_FILES['fichier']['name'];
echo 'uploads/' . $name;
move_uploaded_file($tmpName, './uploads/' . $name);
$chemin_dans_bdd = 'uploads/' .  $name;
echo "<br> à mettre dans la bdd = " . $chemin_dans_bdd;
?>

<body>

    <form action="upload_img.php" method="post" enctype="multipart/form-data">
        <input type="text" name="libelle" value=""><br>
        <input type="file" class="form-control" name="fichier" value=""><br> <input type="submit" value="upload">
    </form>

</body>

</html>