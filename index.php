<?php
session_start();
require('src/connection.php');


if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $check = false;

    if ($password) {
        $password = "kev" . sha1($password . "9875") . "2565";
    };

    $req = $bdd->prepare("SELECT * FROM users where  email=?");
    $req->execute(array($email));
    while ($user = $req->fetch()) {
        if ($user['email'] == $email && $user['password'] == $password) {
            $check = true;
            $_SESSION['connect'] = 1;
            $_SESSION['pseudo'] = $user['pseudo'];
            header('location:./inscription.php?email=valide et password valide');
        }
    }
    if ($check == false) {
        header('location:./?error=1');
    }
}

?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./design/connexion.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js">
    <title>connection</title>
    <script type="application/x-javascript">
        $('.message a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
    </script>
</head>

<body>

    <div class="login-page">
        <div class="form">
            <?php if (isset($_GET['error'])) {
                echo '<p id="error"> Authentification echouer </p>';
            } ?>

            <form class="login-form" method="post">
                <input type="email" name="email" placeholder="email" required />
                <input type="password" name="password" placeholder="password" required />
                <button>login</button>
                <div class="wthree-text">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" name="connect">
                        <span>se souenir moi moi ?</span>
                    </label>
                    <div class="clear"> </div>
                </div>
                <p class="message">Pas encore inscrit ? <a href="inscription.php">Creer un compte</a></p>
            </form>
        </div>
    </div>

</body>

</html>