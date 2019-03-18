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

if ( isset($_FILES['fileToUpload']) )
    {
    foreach ($_FILES['fileToUpload'] as $value)
        {
            echo $value.'<br>';
        }

        // ne pas oublier de créer le repertoire 
        $target_dir = './';  // devra être en mode 775 sous linux ( serveur )
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) 
        {
            echo "Le fichier est valide, et a été téléchargé avec succès.<br>"; 
            echo " le fichier à une taille de "  . $_FILES['fileToUpload']['size'];
        } 
        
        else 
        {
            echo "Erreur";
        }
    }

if (isset($_GET['delete']))
{
    var_dump($value->getPath());
    unlink($value->getPath());
}
?>
<!-- Première ligne du tableau -->
<table class="table table-stripped">
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

    if (isset($_GET['dir']))
    {
        $dir = $_GET['dir'];
    } 

    else 
    {
        $dir = './';
    }

date_default_timezone_set('Europe/Paris');

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}   

foreach (new RecursiveDirectoryIterator($dir) as $value) 
{
    echo "<tr>";
    if ($value ->isDir())
    {
        echo "<td><a href='?dir=" .  $dir . "/" . $value->getFilename() ."'>". $value->getFilename() ."</a></td>";
    }
    
    if ($value ->isFile())
    {
        echo "<td><a href='" .  $dir . "/" . $value->getFilename() ."'>". $value->getFilename() ."</a></td>";
    }

    echo "<td>" . formatSizeUnits($value->getSize()) . "</td>";
    echo "<td>" . date("d F Y H:i:s", filemtime($value)) . "</td>";
    echo "<td><h3><a href='?delete=1'>Delete Now!</a></h3></td>";
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