<?php

    $id = $_GET['id'];

    // $pdo = new PDO ('mysql:localhost; dbname:reservation_hotel', 'root', '');
    $pdo = new PDO('mysql:host=localhost;dbname=reservation_hotel', 'root', '');

    $sqlState = $pdo->prepare('DELETE FROM hotel WHERE id_hotel=?');
    $sqlState->execute([$id]);



    header('location: listerH.php');