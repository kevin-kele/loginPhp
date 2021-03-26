<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./design/connexion.css">
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
    <canvas id="myCanvas">


    </canvas>
    <div class="login-page">
        <div class="form">
            <form class="login-form">
                <input type="email" name="email" placeholder="email" />
                <input type="password" name="password" placeholder="password" />
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