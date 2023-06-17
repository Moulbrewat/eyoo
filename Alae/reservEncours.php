<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


    </head>
    <body>
        

        <?php

            session_start();

            // echo "Bonjour" . $_SESSION['user']['nom'] . " " . $_SESSION['user']['prenom'];

            $sunset = date_sunset(time());
            $timenow = date('H:m:s');

            if ($timenow < $sunset){
                echo "Bonjour" . $_SESSION['user']['nom'] . " " . $_SESSION['user']['prenom'];
            }else {
                echo "Bonsoir" . $_SESSION['user']['nom'] . " " . $_SESSION['user']['prenom'];
            }


            $pdo = new PDO('mysql:host=localhost;dbname=reservation_hotel', 'root', '');
            $sqlState  = $pdo->prepare('SELECT * FROM client
            INNER JOIN reservation on reservation.id_client = client.id_client
            INNER JOIN hotel on hotel.id_hotel = reservation.id_hotel
            WHERE client.id_client = ?
            ');
            $sqlState->execute([$_SESSION['user']['id_client']]);

            $reservations = $sqlState->fetchAll(PDO::FETCH_ASSOC);

        ?>

    <a href="deconnexion.php" class='btn btn-danger'>Deconnexion</a>
    <br>
<table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">id_reservation</th>
                    <th scope="col">client</th>
                    <th scope="col">hotel</th>
                    <th scope="col">date_debut_sejour</th>
                    <th scope="col">date_debut_sejour</th>

                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <?php
                        foreach ($reservations as $reservation) {
                            ?>
                                <th scope="col"><?= $reservation['id_reservation'] ?></th>
                                <th scope="col"><?= $reservation['nom'], $reservation['prenom'] ?></th>
                                <th scope="col"><?= $reservation['titre'] ?></th>
                                <th scope="col"><?= $reservation['date_debut_sejour'] ?></th>
                                <th scope="col"><?= $reservation['date_fin_sejour'] ?></th>
                        <?php
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </body>
</html>
