<?php
// Fonction pour set le fuseau horaire.
date_default_timezone_set('Europe/Paris');

//Fonction de conversion de taille à partir de bytes.
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

// Fonction d'upload de fichier. (/!\ fileToUpload = le nom du champ input.)
// Formulaire d'input pour le fichier. Méthode POST. enctype="multipart/form-data -> /!\ à ne pas l'oublier pour encoder.
// <form action="" method="POST" enctype="multipart/form-data">
//     <input type="file" name="fileToUpload">
//     <input type="submit">
// </form>

function uploadFile()
{
    if( isset($_FILES['fileToUpload']) ) // /!\ fileToUpload = le nom du champ input.
    {
        // Ne pas oublier de créer le repertoire
        $target_dir = './';  // devra être en mode 775 sous linux ( serveur )
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // on crée le nom du fichier dans notre dossier
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file); // on copie le contenu du fichier dans le contenant ci-dessus
    }
}
?>