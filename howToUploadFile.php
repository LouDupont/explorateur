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

    <!-- Other CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom CSS -->
    <style>


    </style>

</head>
<body>

    <!-- CONTENT START -->

    <div class="container">
        <div class="row">
            <div class="col-12">


    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload">
        <input type="submit">

    </form>

    <?php
    var_dump ($_FILES['fileToUpload']);




    foreach ($_FILES['fileToUpload']    as $value){
echo $value.'<br>';

    }

    // ne pas oublier de créer le repertoire 
    $target_dir = './upload/';  // devra être en mode 775 sous linux ( serveur )
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    echo "<br>";
    var_dump($_FILES["fileToUpload"]);
    echo "<br>";
    var_dump($_FILES["fileToUpload"]["name"]);

    echo "<br>";
    var_dump( basename($_FILES["fileToUpload"]["name"]) ) ;
    echo "<br>";
    echo "<br>";



    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo "Le fichier est valide, et a été téléchargé avec succès.<br>"; 
        echo " le fichier à une taille de "  . $_FILES['fileToUpload']['size'];
    } else {
        echo "Erreur";
    }

    ?>




            </div>
        </div>
    </div>

    <!-- CONTENT END -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Custom JS (parallax, etc) -->


    <!-- JS File -->
    <script src="js/main.js"></script>

    <!-- InPage JS -->
    <script>

    </script>

</body>
</html>