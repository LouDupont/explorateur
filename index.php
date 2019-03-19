<?php
require('fonctions.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="description de la page">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom CSS -->
    <style>

    </style>
</head>
<body>

    <!-- CONTENT START -->
<!-- Formulaire d'envoi de fichiers -->
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="fileToUpload">
    <input type="submit">
</form>
<?php

// Si fileToUpload existe -> il y a un fichier à upload
// On appelle la fonction d'upload de fichier.
uploadFile();
?>
<!-- Première ligne du tableau -->
<table class=" table table-dark table-striped">
    <thead>
        <tr>
            <th>File Name</th>
            <th>File size</th>
            <th>Last Updated</th>
            <th>Delete File</th>
        </tr>
    </thead>
<tbody>
<!-- isset -> est-ce que la variable est définie. Dans le cas présent on vérifie l'url du dossier courant.-->
<?php
    // si dir existe -> chemin qui existe 
    if (isset($_GET['dir']))
    {
        //le chemin est celui affiché dans l'URL
        $dir = $_GET['dir'];
    } 

    else 
    {   
        //sinon c'est le chemin par défaut : donc le dossier courant
        $dir = './';
    }
    // suppression de dossier/fichier
    // si on clique sur delete , delete vaut quelque chose
    if (isset($_GET['delete']))
    {
        // on récupère le chemin du fichier/dossier à supprimer
        $filetoDelete = $_GET['file'];
        //si c'est un dossier
        if (is_dir($filetoDelete))
        {   
            //rmdir -> supprime le dossier
            rmdir($filetoDelete);
        }

        else 
        {
            // sinon, c'est que c'est un fichier 
            // unlink -> on supprime le fichier
            unlink($filetoDelete);
        }
    }
// pour chaque valeur (fichier) on crée une nouvelle itération de l'objet DirectoryIterator
foreach (new RecursiveDirectoryIterator($dir) as $value) 
{
    // on récupère la méthode fileName() : nom du fichier, getSize() : taille du fichier, que l'on convertie avec la fonction formatSizeUnits et getMTime : la dernière date de modification du fichier
    $fileName = $value->getFilename();
    $path = $dir . '/' . $fileName;
    $sizeUnits = formatSizeUnits($value->getSize());
    $time = date("d F Y H:i:s", $value->getMTime());

    echo "<tr>";

    if ($value ->isDir())
    {
        echo "<td><a href='?dir=" . $path . "'>" . $fileName ."</a></td>";
    }
    
    if ($value ->isFile())
    {
        echo "<td><a href='?" . $path . "'>" . $fileName ."</a></td>";
    }

    echo "<td>" . $sizeUnits . "</td>";
    echo "<td>" . $time . "</td>";
    echo "<td><h3><a href='?delete=1&file=" . $path . "'>Delete Now!</a></h3></td>";
    echo "</tr>";
}
?>
    </tbody>
</table>
    <!-- CONTENT END -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>