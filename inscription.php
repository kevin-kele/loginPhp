<?php

require('src/connection.php');


if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {

    $check = true;
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];



    // Verification de l'email dans la base de donner
    $req = $bdd->prepare("SELECT COUNT(*) as numberEmail FROM users where  email=?");
    $req->execute(array($email));
    while ($email_verif = $req->fetch()) {
        if ($email_verif['numberEmail'] != 0) {
            $check = false;
            header('location:./?error=true&message=l\'email entre est deja utiliser');
        }
    }

    // Verification de pseudo dans la base de donner
    $req = $bdd->prepare("SELECT COUNT(*) as numberPseudo FROM users where  pseudo=?");
    $req->execute(array($pseudo));
    while ($pseudo_verif = $req->fetch()) {
        if ($pseudo_verif['numberPseudo'] != 0) {
            $check = false;
            header('location:./?error=true&message= Le pseudo entre est deja utiliser');
        }
    }

    if ($check == true) {
        // Hash cle unique a chaque user (secret)
        $secret = sha1($email) . time();
        $secret = sha1($secret) . time() . time();


        if ($password != $password_confirm) {
            header('location:./?error=true&message=Password non identique');
        } else {


            // Cryptage du password Securisation du mot de passe
            $password = "kev" . sha1($password . "9875") . "2565";
            $req = $bdd->prepare("INSERT INTO users(pseudo , email ,password,secret) VALUES (?,?,?,?)");
            $req->execute(array($pseudo, $email, $password, $secret));
            header('location:./?sucess=1');
        }
    }
}



?>



<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files css -->
    <link href="./design/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Inscription</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <?php if (isset($_GET['error']) && isset($_GET['message'])) {
                    $error = $_GET['message']; ?>

                    <p> <?= htmlspecialchars($error) ?> </p>
                <?php } else if (isset($_GET['sucess'])) { ?>

                    <p> <?php echo "Inscription reussi" ?> </p>
                <?php }  ?>
                <form action="#" method="post">
                    <input class="text" type="text" name="pseudo" placeholder="pseudo" required>
                    <input class="text email" type="email" name="email" placeholder="Email" required>
                    <input class="text" type="password" name="password" placeholder="Password" required>
                    <input class="text w3lpass" type="password" name="password_confirm" placeholder="Confirm Password" required>
                    <input type="submit" value="SIGNUP">
                </form>
                <p>Deja inscrit? <a href="./index.php"> connect toi !</a></p>
            </div>
        </div>

        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
</body>

</html>