<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php

        $id = $_GET['id'];

        $pdo = new PDO('mysql:host=localhost;dbname=reservation_hotel', 'root', '');
        $sqlState= $pdo->prepare('SELECT * FROM hotel WHERE id_hotel = ? ');
        $sqlState->execute([$id]);
        $datas = $sqlState->fetch(PDO::FETCH_ASSOC);


        if(isset($_POST['modifier'])){

            $titre = $_POST['titre'];
            $adresse = $_POST['adresse'];
            $prix = $_POST['prix'];
            $type = $_POST['type'];
            $places = $_POST['places'];

            if (!empty($titre) && !empty($adresse) && !empty($prix) && !empty($type) && !empty($places) ){

                $sqlState = $pdo->prepare('UPDATE hotel SET  titre=? , adresse=? , prix_par_nuit=? , id_type=?, nombre_de_palces=? WHERE id_hotel= ? ');
                $sqlState->execute([ $titre, $adresse, $prix, $type, $places, $id ]);




                header('location: listerH.php');
            }else {
                echo " Tous les champs sont requis ";
            }
        }



    ?>

    <form method="post">

    <label for="">Titre</label><br>
    <input type="text" name="titre" id="" value="<?= $datas['titre'] ?>"><br>

    <label for="">Adresse</label><br>
    <input type="text" name="adresse" id="" value="<?= $datas['adresse'] ?>"><br>

    <label for="">Prix par nuit</label><br>
    <input type="number" name="prix" id="" value="<?= $datas['prix_par_nuit'] ?>"><br>

    <select name="type" id="">
        <option value="1">1 star</option>
        <option value="2">2 stars</option>
        <option value="3">3 stars</option>
        <option value="4">4 stars</option>
        <option value="5">5 stars</option>
    </select>
    

    <label for="">numbre de palces</label><br>
    <input type="number" name="places" id="" value="<?= $datas['nombre_de_palces'] ?>"><br>

    <button type="submit" name='modifier' > Modifier</button>

    </form>
</body>
</html>