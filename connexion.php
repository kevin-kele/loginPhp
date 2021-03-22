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
    <div class="login-page">
        <div class="form">
            <form class="register-form">
                <input type="text" placeholder="name" />
                <input type="password" placeholder="password" />
                <input type="text" placeholder="email address" />
                <button>create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form">
                <input type="text" placeholder="username" />
                <input type="password" placeholder="password" />
                <button>login</button>
                <p class="message">Pas encore inscrit ? <a href="index.php">Create an account</a></p>
            </form>
        </div>
    </div>
</body>

</html>