<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
            if(isset($_POST['connexion'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
        
                if (!empty($email) && !empty($password)){
                    $pdo = new PDO('mysql:host=localhost;dbname=reservation_hotel', 'root', '');

                    $sqlState = $pdo->prepare('SELECT * FROM client WHERE email=? AND motPasse=?');
                    $sqlState->execute([$email, $password]);

                    if($sqlState->rowCount()>= 1){
                        session_start();
                        $_SESSION['user'] = $sqlState->fetch(PDO::FETCH_ASSOC);

                        header('location: reservEncours.php ');
    
                    }else{
                        echo 'informations incorrect';
                    }

                }
            }else{
                echo  "required";
            }
    ?>


<form method="post">
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email"><br>

    <label for="">Password</label><br>
    <input type="text" name="password" id=""><br>

    <button type="submit" name="connexion">Connexion</button>
</form>


input name= 'email'
btn submit name=connxion

</body>
</html>