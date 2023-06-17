<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php
        if(isset($_POST['ajouter'])){
            $titre = $_POST['titre'];
            $adresse = $_POST['adresse'];
            $prix = $_POST['prix'];
            $type = $_POST['type'];
            $places = $_POST['places'];

            if (!empty($titre) && !empty($adresse) && !empty($prix) && !empty($type) && !empty($places) ){
                $pdo = new PDO('mysql:host=localhost;dbname=reservation_hotel', 'root', '');

                $sqlState = $pdo->prepare('INSERT into hotel VALUES (null,?,?,?,?,?)');
                $sqlState->execute([$titre, $adresse, $prix, $type, $places]);


                header('location: listerH.php');
            }else {
                echo " Tous les champs sont requis ";
            }
        }



    ?>

    <form method="post">

    <label for="">Titre</label><br>
    <input type="text" name="titre" id=""><br>

    <label for="">Adresse</label><br>
    <input type="text" name="adresse" id=""><br>

    <label for="">Prix par nuit</label><br>
    <input type="number" name="prix" id=""><br>

    <select name="type" id="">
        <option value="1">1 star</option>
        <option value="2">2 stars</option>
        <option value="3">3 stars</option>
        <option value="4">4 stars</option>
        <option value="5">5 stars</option>
    </select>
    

    <label for="">numbre de palces</label><br>
    <input type="number" name="places" id=""><br>

    <button type="submit" name='ajouter' > Ajouter</button>

    </form>
</body>
</html>