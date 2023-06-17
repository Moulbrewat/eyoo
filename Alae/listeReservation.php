<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
    <?php
        //  

        //  $sqlState= $pdo->query('SELECT * FROM typehotel');
        //  $datas = $sqlState->fetchAll(PDO::FETCH_ASSOC);




        if(isset($_POST['chercher'])){

            $id = $_POST['type_id'];

            $pdo = new PDO('mysql:host=localhost;dbname=reservation_hotel', 'root', '');

            $sqlState = $pdo->prepare('SELECT * FROM reservation
            INNER JOIN hotel on  hotel.id_hotel = reservation.id_hotel
            INNER JOIN typehotel  on  hotel.id_type = typehotel.id_type
            WHERE typehotel.id_type = ? ');

            $sqlState -> execute([$id]);
            $reservations = $sqlState ->fetchAll(PDO::FETCH_ASSOC);

 
            
        }

    ?>


    <form  method="post">
        <select name="type_id" id="">
        <option value="1">1 star</option>
        <option value="2">2 stars</option>
        <option value="3">3 stars</option>
        <option value="4">4 stars</option>
        <option value="5">5 stars</option>
        
        </select>
            <button type="submit" name='chercher'>chercher</button>
    </form>

    <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">titre</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">prix par nuit</th>
                    <th scope="col">nombre place</th>

                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <?php
                        foreach ($reservations as $reservation) {
                            ?>
                                <th scope="col"><?= $reservation['titre'] ?></th>
                                <th scope="col"><?= $reservation['nombre_etoile'] ?> etoiles</th>
                                <th scope="col"><?= $reservation['adresse'] ?></th>
                                <th scope="col"><?= $reservation['prix_par_nuit'] ?></th>
                                <th scope="col"><?= $reservation['nombre_de_palces'] ?></th>
                        <?php
                        }
                    ?>
                </tr>
            </tbody>
        </table>




</body>
</html>
