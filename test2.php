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

<?php
    $files = scandir('../');

    function scan($dir) {
        // On regarde déjà si le dossier existe
        if(is_dir($dir)) {
            // On le scan et on récupère dans un tableau le nom des fichiers et des dossiers
            $files = scandir($dir);
    
            // On supprime . et .. qui sont respectivement le dossier courant et le dossier précédent
            unset($files[0], $files[1]);
    
            // On tri le tableau de façon intéligente (à la façon humaine)
            // http://www.php.net/function.natcasesort
            natcasesort($files);
    
            // On commence par afficher les dossiers
            foreach($files as $f) {
                // S'il y a un dossier
                if(is_dir($dir.$f)) {
                    // On affiche alors les données
                    echo '<li class="folder">'.$f.'</li>';
                    echo '<ul class="tree">';
    
                    // Et du coup comme c'est un dossier, un le rescan
                    scan($dir.$f."/");
    
                    echo '</ul>';
                }
            }
    
            // Puis on affiche les fichiers
            foreach($files as $f) {
                // S'il y a un fichier
                if(is_file($dir.$f)) {
                    echo '<li class="file" rel="'.$dir.$f.'">'.$f.'</li>';
                }
            }
        }
    }
scan('../');
?>
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