<?php
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {  // On vérifie que l'image existe

    if ($_FILES['image']['size'] <= 8000000) { // poids inférieur a 8 MO (et non pas MB)

        $informationsImage = pathinfo($_FILES['image']['name']);
        $extensionImage = $informationsImage['extension'];
        $extensionsArray = array('png', 'gif', 'jpg', 'jpeg'); // Extensions d'image autorisé, nous pouvons allonger la liste

        if (in_array($extensionImage, $extensionsArray)) {  // On vérifie le type d'image pour l'envoyer sur le serveur

            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . time() . basename($_FILES['image']['name'])); // On renomme notre photo fraichement upload grace à un timestamp et au nom de l'image donné par l'utilisateur

            echo 'Your image has been received.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> A little image host.</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <!-- HEADER -->
    <header>
        <h1>Host your image!</h1>
    </header>

    <div class="container-fluid">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <p>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile04">
                        <label class="custom-file-label" for="inputGroupFile04"></label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Submit</button>
                    </div>
            </p>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>