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

            include_once 'include/nav.php';

            $pdo = new PDO('mysql:host=localhost;dbname=reservation_hotel', 'root', '');

            $sqlState= $pdo->query('SELECT * FROM hotel');
            $datas = $sqlState->fetchAll(PDO::FETCH_ASSOC);



            function comparer($a, $b) {
                return strcmp($a['titre'], $b['titre']);
            }
            
            usort($datas, 'comparer');

            
    ?>
     <br>


    <div class="table-responsive">
    <br>
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">titre</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">prix par nuit</th>
                    <th scope="col">id type</th>
                    <th scope="col">nombre place</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                    <?php
                        foreach ($datas as $data) {
                            ?>
                                <tr class="">
                                <th scope="col"><?= $data['id_hotel'] ?></th>
                                <th scope="col"><?= $data['titre'] ?></th>
                                <th scope="col"><?= $data['adresse'] ?></th>
                                <th scope="col"><?= $data['prix_par_nuit'] ?></th>
                                <th scope="col"><?= $data['id_type'] ?></th>
                                <th scope="col"><?= $data['nombre_de_palces'] ?></th>
                                <th>
                                    <a href="supprimer.php?id=<?php echo $data['id_hotel'] ?>" onclick="return confirm('voulez vous supprimer cette element')"><button type="submit" class="btn btn-danger">Supprimer</button></a>
                                    <a href="modifier.php?id=<?php echo $data['id_hotel'] ?>" class ="btn btn-info">Modifier</a>
                            </th>
                                </tr>
                        <?php
                        }
                    ?>

            </tbody>
        </table>
    </div>
    
</body>
</html>